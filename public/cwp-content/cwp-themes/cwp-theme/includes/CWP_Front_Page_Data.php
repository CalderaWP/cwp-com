<?php
/**
 * Data for populating the front-page
 *
 * @package   @cwp-com
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Front_Page_Data {

	/**
	 * Return an array of data for front page feature elements
	 *
	 * @return array
	 */
	protected static function front_page_feature_sections() {
		return array(
			array(
				'title' => 'Elegant Solutions To Complex WordPress Problems',
				'tagline' => 'WordPress Plugins',
				'title_link' => '#',
				'title_link_title' => 'Caldera Plugins: Complex Tasks Made Easy',
				'background' => 9,
				'background_style' => '',
				'content' => array(

				),
				'easy_pod' => 'featured_products',
				'easy_pod_wrap_class' => 'block-grid-3'
			),
			array(
				'title' => 'Caldera Forms',
				'tagline' => 'Responsive Form Builder',
				'title_link' => get_permalink( 447 ),
				'title_link_title' => 'Caldera Forms: Responsive Form Builder',
				'background' => 706,
				'background_style' => '',
				'content' => array(
					'p' => array(
						"With an intuitive drag and drop interface--based on a responsive grid--and a wide range of add-ons, it's never been easier to create forms for your WordPress site that look great on any device, thanks to Caldera Forms. This free plugin includes all of the form types you want, mail and redirect processors, entry logging and AJAX submissions.",
						sprintf( 'Caldera Forms is a free plugin %1s. We also offer a full range of %2s, including payment processors and service integrations.', cwp_theme_cf_wporg_link( 'you can download from WordPress.org' ), CWP_Theme_EDD::caldera_form_add_on_link() )
					)
				)
			),
			array(
				'title' => 'Caldera Answers',
				'tagline' => 'WordPress Development, The Right Way',
				'title_link' => get_permalink( CWP_Theme_Caldera_Answers::$caldera_answers_id ),
				'title_link_title' => 'Caldera Answers: WordPress Development, The Right Way',
				'background' => 9,
				'background_style' => '',
				'content' => array(
					'p' => array(
						'Caldera Answers is a set of resources, and training tools for learning WordPress development the right way, by CalderaWP\'s Josh Pollock. Josh is contributor to the top WordPress news and tutorial sites, including <a href="http://jpwp.me/tutsplus">Tuts+</a>, <a href="http://torquemag.io/author/joshp/">Torque</a>, <a href="http://jpwp.me/wpmu">WPMUDEV</a>, <a href="http://jpwp.me/wpbeginner">WPBegginer</a>.',
						sprintf( 'Through Caldera Answers he offers his highly-opinionated collection of %1s as well as training courses. The %2s teach WordPress development using a project-oriented approach designed to give beginner and intermediate WordPress developers practical training using establish standards, the best tools and best practices.', CWP_Theme_Caldera_Answers::search_page_link( '"How To Do X With WordPress" links' ), CWP_Theme_Caldera_Answers::course_page_link( 'Caldera Answers Courses' ) ),
					)
				),
			)
		);
	}

}
