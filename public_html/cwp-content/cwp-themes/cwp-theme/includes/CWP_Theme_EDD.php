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
				$product_tagline = get_post_meta( $id, 'product_tagline',true );
				if ( is_string( $product_tagline ) ) {
					$title_text = $product_tagline;
				}else{
					$title_text = sprintf( 'View %1s', $post->post_title );
				}

				$link = sprintf( '<a href="%1s" title="%2s">%3s</a>', esc_url( $link ), esc_attr( $title_text ), $post->post_title );
			}

			return $link;

		}

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

}
