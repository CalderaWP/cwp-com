<?php
/**
 * EDD reflated stuff.
 *
 * @package   @cwp_com
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Theme_EDD extends CWP_Theme_EDD_Product_IDs {

	/**
	 * Get a link to a product category archive.
	 *
	 * @param string $category_slug
	 * @param bool $as_html
	 * @param string $link_text
	 *
	 * @return string
	 */
	public static function category_link( $category_slug, $as_html = false, $link_text = false ) {
		$link = get_term_link( $category_slug,  'download_category' );

		if ( ! is_wp_error( $link ) ) {
			if ( $as_html ) {
				$term = get_term_by( 'slug', $category_slug, 'download_category' );
				$name = $term->name;
				$title_text = sprintf( 'See all products in the %1s category.', $name );

				if ( ! $link_text ) {
					$link_text  = $name;
				}

				$link = sprintf( '<a href="%1s" title="%2s">%3s</a>', esc_url( $link ), esc_attr( $title_text ), $link_text );
			}

			return $link;

		}

	}

	/**
	 * Link to CF add-ons category with link text
	 *
	 * @return string
	 */
	public static function caldera_form_add_on_link() {
		return CWP_Theme_EDD::category_link( 'caldera-forms-add-on', true, 'Add-ons for Caldera Forms' );

	}


	/**
	 * Create a product link as HTML or return the link itself.
	 *
	 * @access protected
	 *
	 * @param int $id Product ID
	 * @param bool $as_html Optional. To return full html markup, the default, or just the URL.
	 *
	 * @return bool|string
	 */
	protected static function product_link( $id, $as_html = true ) {
		$link = get_permalink( $id );
		if ( is_string( $link ) ) {
			if ( $as_html ) {
				$post = get_post( $id );
				$product_tagline = self::product_tagline( $id );
				if ( $product_tagline && is_string( $product_tagline ) && $post->post_title != $product_tagline ) {
					$title_text = $product_tagline;
				}else{
					$title_text = sprintf( 'View %1s', $post->post_title );
				}

				$link = sprintf( '<a href="%1s" title="%2s">%3s</a>', esc_url( $link ), esc_attr( $title_text ), $post->post_title );
			}

			return $link;

		}

		return '';

	}

	/**
	 * Link to Easy Pods Product Page
	 *
	 * @param bool $as_html Optional. To return full html markup, the default, or just the URL.
	 *
	 * @return bool|string
	 */
	public static function easy_pods_link( $as_html = true ) {
		return self::product_link( self::$easy_pods_post_id, $as_html );

	}

	/**
	 * Link to Easy Rewrites Product Page
	 *
	 * @param bool $as_html Optional. To return full html markup, the default, or just the URL.
	 *
	 * @return bool|string
	 */
	public static function easy_rewrites_link( $as_html = true ) {
		return self::product_link( self::$easy_rewrites_post_id, $as_html );

	}

	/**
	 * Get the categories for a download
	 *
	 * @param int $id Post ID for a download.
	 * @param bool $slugs_only Optional. If true, return only slugs for matches. Default is false.
	 *
	 * @return array
	 */
	public static function get_download_categories( $id, $slugs_only = false ) {
		$terms = wp_get_post_terms( $id, 'download_category' );
		if ( $slugs_only ) {
			$terms = wp_list_pluck( $terms, 'slug' );
		}

		return $terms;

	}

	/**
	 * Render a related product box
	 *
	 * @param int $id Post ID for a download.
	 *
	 * @return string
	 */
	public static function related_products_box( $id ) {
		$query = self::related_products_query( $id );
		$out = false;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$out[] = self::product_link( $query->post->ID );
			}

			wp_reset_postdata();
		}

		if ( is_array( $out ) ) {
			$out = '<span>'.implode( '</span><span>', $out ).'</span>';
			return sprintf( '<div class="related-products"><h5>Related Products</h5><div>%1s</div></div>', $out );

		}

		return  '';

	}

	/**
	 * Get or make a product's tagline.
	 *
	 * @param int $id Post ID for a download.
	 *
	 * @return string
	 */
	public static function product_tagline( $post ) {
		if ( ! is_object( $post ) ) {
			$post = get_post( $post );
		}

		$product_tagline = get_post_meta( $post->ID, 'product_tagline', true );

		if ( ! is_string( $product_tagline ) ) {
			$product_tagline = $post->post_title;
		}

		return $product_tagline;
	}


	/**
	 * Get up to 3 related downloads
	 *
	 * @param int $id Post ID for a download.
	 *
	 * @return WP_Query
	 */
	protected static function related_products_query( $id ) {
		$terms = self::get_download_categories( $id, true );
		$args  = array(
			'post_type' => 'download',
			'posts_per_page' => 3,
			'orderby' => 'rand'

		);

		if ( is_array( $terms ) && ! empty( $terms ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'download_category',
					'field'    => 'slug',
					'terms'    => $terms,
				),
			);
		}

		$query = new WP_Query( $args );

		return $query;

	}

}
