<?php
/**
 * @TODO What this does.
 *
 * @package   @TODO
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Front_Page extends CWP_Front_Page_Data {


	public static function front_page_features() {
		$data = self::front_page_feature_sections();
		$out = array();
		foreach( $data as $section ) {
			$out[] = self::front_page_feature( $section );
		}

		return implode( '', $out );

	}


	protected static function front_page_feature( $data ) {
		$out[] = sprintf( '<div class="title-wrap">
						<h3><a href="%1s" title="%2s">%3s</a> <span>%4s</span></h3>
			</div><div class="clear"></div>', $data[ 'title_link' ], $data[ 'title_link_title' ], $data[ 'title' ], $data[ 'tagline' ] );
		if ( isset( $data[ 'content' ][ 'p' ] ) ) {
			foreach( $data[ 'content' ][ 'p' ] as $p ) {
				$out[] = $p;
			}

		}

		$style_tag = self::style_tag( $data[ 'background' ], $data[ 'background_style' ] );

		return sprintf( '<div class="front-page-feature" %1s >%2s</div>', $style_tag, implode( '', $out ) );

	}

	protected static function style_tag( $background_image_id, $additional_style = false ) {
		return cwp_theme_background_style_tag( $background_image_id, $additional_style );

	}
}
