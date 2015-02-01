<?php
/**
 * Social Links
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Social {

	/**
	 * Data for social links
	 *
	 * @param string $who Whose data? david|josh|cwp
	 *
	 * @return array|void
	 */
	public static function our_data( $who ) {
		$data[ 'david' ] = array(
			'name'     => 'David Cramer',
			'gravatar' => 'dlcramer@gmail.com',
			'social'   => array(
				'twitter'   => 'dcramer',
				'github'    => 'Desertsnowman',
				'wordpress' => 'desertsnowman',
				'home'      => 'http://cramer.co.za/'
			)
		);

		$data[ 'josh' ] = array(
			'name'     => 'Josh Pollock',
			'gravatar' => 'josh@joshpress.net',
			'social'   => array(
				'twitter'   => 'josh412',
				'github'    => 'Shelob9',
				'wordpress' => 'Shelob9',
				'home'      => 'http://JoshPress.net'
			)
		);

		$data[ 'cwp' ] = array(
			'name'     => 'CalderaWP',
			'social'   => array(
				'twitter'   => 'calderawp',
				'facebook'  => 'CalderaWP',
				'googleplus' => 'https://plus.google.com/115787874617175315327',
				'github'    => 'calderawp',
			)
		);

		if ( array_key_exists( $who, $data ) ) {
			$data = $data[ $who ];

		} else {
			return;
		}

		return $data;

	}

	/**
	 * Create HTML for social links.
	 *
	 * @param array $social_data Data. 'network_name' => 'user_name'
	 * @param string $name The person/thing's name.
	 * @param bool $return_array Optional. To return array of link HTML if true or if false, the default, to implode and wrap the array into a string.
	 *
	 * @return array|string|void Returns HTML for social links, or an array of each link's HTML
	 */
	public static function social_html( $social_data, $name, $return_array = false ) {
		if ( ! is_array( $social_data ) ) {
			return;
		}

		foreach ( $social_data as $network => $username ) {
			$what = $network;
			$link = '#';
			if ( 'twitter' == $network ) {
				$link = 'https://twitter.com/' . $username;
			} elseif ( 'github' == $network ) {
				$link = 'https://github.com/' . $username;

			} elseif ( 'wordpress' == $network ) {
				$link = 'https://profiles.wordpress.org/' . $username;
				$what = 'WordPress.org Profile';
			} elseif ( 'home' == $network ) {
				$link = $username;
				$what = 'website';
			}elseif( 'facebook' == $network ) {
				$link = 'http://facebook.com/' . $username;
			}
			else{
				$link = $username;
			}

			$what = ucwords( $what );

			$social[] = sprintf(
				'<a href="%1s" title="%2s\'s %3s" target="_blank"><span class="genericon genericon-%4s"></span></a>',
				esc_url( $link ), $name, $what, $network
			);

		}

		if( $return_array ) {
			return $social;

		}

		$social_html = implode( $social );

		return $social_html;

	}

	/**
	 * Social links for CalderaWP
	 *
	 * @return string
	 */
	public static function cwp_social_links() {
		$data = self::our_data( 'cwp' );
		$social = self::social_html( $data[ 'social'], $data[ 'name' ], true );
		$social = '<li>' . implode( '</li><li>', $social ) . '</li>';

		return sprintf( '<div id="cwp-social-links"><ul>%1s</ul></div>', $social );

	}

	/**
	 * A widget for CWP Social.
	 *
	 * @return string
	 */
	public static function cwp_social_pseudo_widget() {
		$content = self::cwp_social_links();
		$wrap = array(
			'before_title' => '<h3 class="widget-title cwp-social-widget">',
			'after_title' => '</h3>',
			'before_widget' => '<div class="widget"><div class="widget-content">',
			'after_widget' => '</div><div class="clear"></div></div>'
		);

		$content = $wrap[ 'before_widget' ] . $content . $wrap[ 'after_widget' ];

		return $content;
	}

}

?>

