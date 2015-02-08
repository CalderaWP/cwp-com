<?php
/**
 * Creates Markup and other data for a product page
 *
 * @package   @cwp_theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Plugin_Page {

	/**
	 * @var object|\Pods
	 */
	private $pod;

	/**
	 * @var object|\WP_Post
	 */
	private $post;

	/**
	 * Attributes for use in header.
	 *
	 * @var array
	 */
	public $header_atts;

	/**
	 * Array of prices for this product
	 *
	 * @var array
	 */
	public $pricing;

	/**
	 * CWP Logo HTML
	 *
	 * @var string
	 */
	public $logo;

	/**
	 * Constructor for class
	 *
	 * @param object|WP_Post $post Post object
	 */
	public function __construct( $post) {
		$this->post = $post;
		$this->header_atts = $this->header_atts();
		$this->pod = $this->pod();
		$this->logo = wp_get_attachment_image( 771 );
		$this->pricing = $this->pricing();



	}
	
	public function page() {
		$key = md5( __CLASS__ . $this->post->ID );
		if ( false == ( $page = wp_cache_get( $key ) )  ) {
			$page[] = $this->feature_section();
			$page[] = $this->testimonials_section();
			$page[] = $this->price_table();
			$page[] = $this->contact_section();
			$page = implode( '', $page );
			wp_cache_set( $key, $page, '', 399 );
		}

		return $page;
	}

	protected function header_atts() {
		$fields = array(
			'tagline' => 'product_tagline',
			'header_bg' => 'header_image',
			'title' => 'post_title',

		);

		$atts = array();
		foreach( $fields as $key => $field ) {
			$atts[ $key ] =  $this->pod()->display( $field );
		}

		return $atts;

	}

	/**
	 * @return object|\Pods
	 */
	public function pod( ) {

		$this->pod = pods( $this->post->post_type, $this->post->ID );


		return $this->pod;

	}

	private function features() {

		for ( $i = 1; $i <= 3; $i++) {

			foreach(
				array(
					'title',
					'text',
					'learn_more_link_text',
					'learn_more',
					'image'
				) as $field ) {
				$the_field = 'benefit_' . $i . '_' . $field;
				if ( 'learn_more' == $field  ) {
					$value = get_permalink( $this->pod->field( $the_field . '.ID' ) );
				}elseif( 'image' == $field) {
					$id = $this->pod->field( $the_field . '.ID' );
					$value = array(
						wp_get_attachment_url( $id ),
						get_post_meta( $id, '_wp_attachment_image_alt', true )
					);
				}else{
					$value = $this->pod->display(  $the_field  );
				}

				$features[ $i ][ $field ] = $value;

			}

		}

		return $features;

	}

	public function feature_section() {
		$out[] = '<!--Features Section--><section class="feature-styles" id="features" >';
		$i = 0;
		foreach( $this->features() as $feature) {
			$left = false;
			if ( 1 == $i ) {
				$left = true;
			}
			$out[] = $this->feature( $feature, $left );
			$i++;
		}

		$out[] = '</section>';
		return implode( '', $out );

	}

	protected function feature( $data, $left ) {
		$image = sprintf( '<img class="plugin-features-image" src="%1s" alt="%2s"  />', $data[ 'image' ][0], $data[ 'image' ][1] );
		$link = sprintf(
			'<a href="%1s" title="%2s">%3s</a>',
			esc_url( $data['learn_more'] ),
			esc_attr( $data['learn_more_link_text'] ),
			$data[ 'learn_more_link_text' ]
		);

		$image = sprintf(
			'<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
					%1s
				</div>', $image
		);

		$text = sprintf(
			'<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h1>%1s</h1>
				<div class="txt">%2s</div>
				<div class="getstarted">%3s</div>
			</div>',
			$data[ 'title' ],
			$data[ 'text' ],
			$link
		);

		if ( $left ) {
			$content = $image.$text;
		}else{
			$content = $text.$image;
		}

		return '<div class="container feature-container">' . $content . '</div>';



	}

	protected function _feature( $data ) {
		$image = sprintf( '<img class="alignleft size-full " src="%1s" alt="%2s"  />', $data[ 'image' ][0], $data[ 'image' ][1] );
		$out[] = sprintf( '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">', $image );
		$out[] = sprintf(
			'<div class="col-lg-pull-6 col-md-6 col-sm-12 col-xs-12">
				<h1>%1s</h1>
				<div class="txt">%2s</div>
				<div class="getstarted">%3s</div>
			</div>',
			$data[ 'title' ],
			$data[ 'text' ],
			sprintf(
				'<a href="%1s" title="%2s">%3s</a>',
				get_permalink( $data[ 'learn_more' ] ),
				$data[ 'learn_more_link_text' ],
				$data[ 'learn_more_link_text' ]
			)
		);
		$out[] = '</div>';

		return implode( '', $out );

	}

	protected function pricing() {
		$prices = edd_get_variable_prices( $this->post->ID );

		$args = array(
			'download_id' => $this->post->ID,
			'text'        => __( 'Choose', 'cwp-theme' ),
		);
		foreach( $prices as $i => $price ) {
			$args[ 'price_id' ] = $price[ 'index' ];

			$link = edd_get_purchase_link( $args  );
			$link = str_replace( 'Checkout</a>',  __( 'Choose', 'cwp-theme' ).'</a>', $link );
			$link = sprintf( '<div id="purchase-%1s">%2s</div>', $i, $link );

			$prices[ $i ][ 'link' ] = $link;
			$prices[ $i ][ 'sites' ] = $price[ 'name' ];

		}

		$prices[ 1 ][ 'level' ] = __( 'Personal', 'cwp-theme' );
		$prices[ 2 ][ 'level' ] = __( 'Business', 'cwp-theme' );
		$prices[ 3 ][ 'level' ] = __( 'Developer', 'cwp-theme' );


		return $prices;
	}


	public function price_table() {
		$out[] = sprintf( '<!--Pricing Table Section--><section id="pricing"><div class="container">
<div class="container">%1s</div>', $this->purchase_cta());
		$i = 1;
		foreach( $this->pricing() as $price ) {
			$out[] = sprintf(
				'<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pricing-box">
					<div id="price-%0s" class="bggray price">
						<div class="package">%1s</div>
						<div class="divider"></div>
						<div class="amount">$%2s</div>
						<div class="duration">%3s</div>
					</div>
					<div class="featcontent">
						<div class="feat-list">
							<ul>
								<li>Support & Updates for One Year</li>
							</ul>
						</div>
						%4s

					</div>
				</div>',
				$i,
				$price[ 'level' ],
				$price[ 'amount' ],
				$price[ 'sites' ],
				$price[ 'link' ]
			);
			$i++;

		}

		$out[] = '</div></section>';

		return implode( '', $out );

	}

	protected function purchase_cta() {
		$cta = array( 'header', 'text' );
		$out = false;
		foreach( $cta as $field ) {
			if ( ! is_null( $value = $this->pod->display( 'cta_header_' . $field ) ) ) {
				$out[] = '<div class="pricing-cta-'.$field.' >' . $value . '</div>';
			}
		}

		if ( $out ) {
			return implode( '', $out );
		}


	}


	protected function testimonals_data() {
		return array();
	}

	public function testimonials_section() {
		if ( empty( $this->testimonals_data() ) ) {
			return;
		}

		$out[] = '<!--Testimonials Section--><section class=" testimonial-bg"><div id="testimonial" class="flexslider "><div class="container"><ul class="slides">';
		foreach( $this->testimonals_data() as $testimonial ) {
			$out[] = $this->testimonial( $testimonial );
		}
	}

	protected function testimonial( $data ) {
		return sprintf(
			'<li>

					<div class="testimonial-photo"><img src="images/body/testimonial-img.png" alt=""></div>
					<div class="container">
						<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 testimonial-content">
							%1s
							</p>
						</div>
					</div>
				</li>', wp_oembed_get( esc_url( $data[ 'tweet_url' ] ) )
		);

	}

	public function contact_section() {
		return sprintf(
			'<!--Contact Section--><section id="contact">
				<div class="container contact-info">%1s</div>
				<div class="container" id="contact-inner">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact">
						<h1>Have A Question?</h1>
						<h2>If you have a pre-sale question, or are a registered user who needs support, or just want to say hi, get in touch.</h2>
					</div>
				</div>
				<div class="container contact-form">
					%2s
				</div>
			</section>',
			CWP_Social::cwp_social_links(),
			Caldera_Forms::render_form( 'CF54d702af07cef' )
		);

	}


	public function menu( $menu_name = 'product_page_menu') {


		$menu_items = wp_get_nav_menu_items($menu_name);

		$menu_list = '<ul id="menu-' . $menu_name . '" class="navi">';

		foreach ( (array) $menu_items as $key => $item ) {
			$title = $item->title;
			$url = $item->url;
			$menu_list .= '<li><a href="' . esc_url( $url ) . '" title="' . esc_attr( $item->post_excerpt ) .'">' . $title . '</a></li>';
		}
		$menu_list .= '</ul>';

		return $menu_list;


	}

}



/**
 * @return \CWP_Plugin_Page
 */
function cwp_theme_plugin_data() {
	global $plugin_data;
	if ( ! is_object( $plugin_data ) ) {
		global $post;
		$plugin_data = new CWP_Plugin_Page( $post );
	}

	return $plugin_data;
}
