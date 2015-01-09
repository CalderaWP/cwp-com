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
 * Enqueue Baldrick
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'wp-balrick', get_stylesheet_directory_uri() ."/assets/js/src/wp-baldrick-full.js");
	wp_enqueue_style( 'wp-balrick', get_stylesheet_directory_uri() ."/assets/css/baldrick/modal.css");
});

/**
 * Create a modal using Baldrick and output HTML for it.
 *
 * @param string $action Name of action to run
 * @param string $text Text for link that opens said
 * @param bool|array $atts Optional. Additional data-* to use in element.
 *
 * @return string
 */
function cwp_theme_baldrick_modal_trigger( $action, $text, $atts = false ) {

	$atts[ 'data-action' ] = $action;

	foreach( $atts as $att => $value ) {
		$att_out[] = esc_attr( $att ).'='.esc_attr( $value );
	}

	$att_out = implode( ' ', $att_out );

	return '<a class="wp-baldrick" data-modal="true" '.$att_out.' >'.$text.'</a>';
}

/**
 * Open Single Caldera Answer in a modal via Baldrick
 */
add_action( 'wp_ajax_cwp_theme_load_single_caldera_answer', function() {
	if ( function_exists( 'pods' ) ) {
		$id = pods_v_sanitized( 'data-answer-id', 'post' );
		if ( $id ) {
			$out = cwp_theme_get_single_answer_view( $id );
			if ( $out ) {
				die( $out );

			}

		}

	}

});

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
			$pods = pods( 'caldera_answer', $id );
			if ( $pods->id() == $id ) {
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
