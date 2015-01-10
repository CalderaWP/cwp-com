<?php
/**
 * Functions related to Baldrick
 *
 * @package   @cwp_theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */


/**
 * Open Single Caldera Answer in a modal via Baldrick
 */
add_action( 'wp_ajax_cwp_theme_load_single_caldera_answer', 'cwp_theme_load_single_caldera_answer_cb' );
add_action( 'wp_ajax_nopriv_cwp_theme_load_single_caldera_answer', 'cwp_theme_load_single_caldera_answer_cb' );
function cwp_theme_load_single_caldera_answer_cb() {

	if ( function_exists( 'pods' ) ) {
		$id = pods_v_sanitized( 'answerId', 'post' );
		if ( $id ) {
			$out = cwp_theme_get_single_answer_view( $id );
			if ( $out ) {
				die( $out );

			}

		}

	}

	die( __( 'Sorry, something went wrong. Much sadness, very fail.', 'cwp-theme' ) );

}

/**
 * Get the rendered template for a single Caldera Answer
 *
 * @param int|string $id ID
 *
 * @return bool|mixed|null|void
 */
function cwp_theme_get_single_answer_view( $id, $template = 'single answer' ) {
	if ( function_exists( 'pods' ) ) {
		$key = __FUNCTION__.'_'.$id;
		if ( false == ( $out = pods_transient_get( $id ) ) ) {
			$pods = pods( 'caldera_answers', $id, true );
			if ( is_object( $pods ) && $pods->id() == $id ) {
				$out = $pods->template( $template );
			}

			if ( is_string( $out ) ) {
				pods_transient_set( $key, $out, WEEK_IN_SECONDS );
			}

		}

		if ( is_string( $out ) ) {
			return $out;

		}

	}


}
