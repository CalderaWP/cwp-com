<?php
/**
 * Caldera Answers related
 *
 * @package   @cwp_com
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Theme_Caldera_Answers {
	/**
	 * ID for Caldera Answers parent page
	 *
	 * @var int
	 */
	public static $caldera_answers_id = 283;

	/**
	 * ID for Caldera Answers search page
	 *
	 * @var int
	 */
	public static $caldera_answers_search_id = 400;

	/**
	 * ID for Caldera Answers courses page
	 *
	 * @var int
	 */
	public static $caldera_answers_courses_id = 398;

	/**
	 * Link for Caldera Answers parent page
	 *
	 * @param bool|string $text Optional. Text of link. Default is post title.
	 *
	 * @return string
	 */
	static function parent_page_link( $text = false) {
		return self::link( self::$caldera_answers_id, $text );

	}

	/**
	 * Link for Caldera Answers search page
	 *
	 * @param bool|string $text Optional. Text of link. Default is post title.
	 *
	 * @return string
	 */
	static function search_page_link(  $text = false ) {
		return self::link( self::$caldera_answers_search_id, $text );

	}

	/**
	 * Link for Caldera Answers courses page
	 *
	 * @param bool|string $text Optional. Text of link. Default is post title.
	 *
	 * @return string
	 */
	public static function course_page_link( $text = false ) {
		return self::link( self::$caldera_answers_courses_id, $text );

	}

	/**
	 * Create links for Caldera Answers Pages
	 *
	 * @access protected
	 *
	 * @param int $id Post ID
	 * @param bool|string $text Optional. Text of link. Default is post title.
	 *
	 * @return string
	 */
	protected static function link( $id, $text = false ) {
		$post = get_post( $id );
		$link = get_permalink( $id );

		if ( ! is_string( $text ) ) {
			$text = $post->post_title;
		}

		$link = sprintf( '<a href="%1s" title="%2s">%3s</a> ', $link, $post->post_title, $text );

		return $link;


	}

}
