<?php
/**
 * Class for the documentation.
 *
 * @package   @cwp_theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

/**
 * Class CWP_Docs
 */
class CWP_Docs {

	/**
	 * The ID for the Docs page
	 *
	 * @var int
	 */
	public static $docs_page_id = 469;

	/**
	 * Add some Easy Pods and other markup to the docs page
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	public static function content_filter( $content ) {
		$slug  = pods_v_sanitized( 'product-slug' );
		$title = $docs = false;
		if ( $slug ) {
			$product_link = CWP_Theme_EDD::product_by_slug( $slug, true );
			if ( is_string( $product_link ) ) {
				$title = __( sprintf( 'All Docs For %1s', $product_link ), 'cwp-theme' );
				$docs  = cep_render_easy_pod( 'auto_docs_list' );
			}

		}

		if ( ! $title ) {
			$title = __( 'All Caldera WP Docs', 'cwp-theme' );
			$docs  = cep_render_easy_pod( 'all_docs' );
		}

		$title = '<h3>' . $title . '</h3>';

		$content = implode( '', array( $title, $docs, '<hr / >', $content ) );


		return $content;
	}

}
