<?php
/**
 * Create front page markup
 *
 * @package   @cwp_com
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Front_Page extends CWP_Front_Page_Data {

	/**
	 * Output the front page features markup
	 *
	 * @return string
	 */
	public static function front_page_features() {
		$data = self::front_page_feature_sections();
		$out = array();
		foreach( $data as $section ) {
			$out[] = self::front_page_feature( $section );
		}

		return implode( '', $out );

	}

	/**
	 * Create markup for each individual front page feature
	 *
	 *
	 * @access protected
	 *
	 * @param array $data
	 *
	 * @return string
	 */
	protected static function front_page_feature( $data ) {
		$out[] = sprintf( '<div class="title-wrap">
						<h3><a href="%1s" title="%2s">%3s</a> <span>%4s</span></h3>
			</div><div class="clear"></div>', $data[ 'title_link' ], $data[ 'title_link_title' ], $data[ 'title' ], $data[ 'tagline' ] );
		if ( isset( $data[ 'content' ][ 'p' ] ) ) {
			foreach( $data[ 'content' ][ 'p' ] as $p ) {
				$out[] = '<p>'.$p.'</p>';
			}

		}

		$style_tag = cwp_theme_background_style_tag( $data[ 'background' ], $data[ 'background_style' ] );

		return sprintf( '<div class="front-page-feature" %1s >%2s</div>', $style_tag, implode( '', $out ) );

	}

}
