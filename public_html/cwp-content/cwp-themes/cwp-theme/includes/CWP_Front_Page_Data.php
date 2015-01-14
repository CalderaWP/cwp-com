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

class CWP_Front_Page_Data {

	protected static function front_page_feature_sections() {
		return array(
			array(
				'title' => 'Caldera Forms',
				'tagline' => 'Responsive Form Builder',
				'title_link' => get_permalink( 303 ),
				'title_link_title' => 'Caldera Forms: Responsive Form Builder',
				'background' => 8,
				'background_style' => '',
				'content' => array(
					'p' => array(
						"With an intuitive drag and drop interface--based on a responsive grid--and a wide range of add-ons, it's never been easier to create forms for your WordPress site that look great on any device, thanks to Caldera Forms. This free plugin includes all of the form types you want, mail and redirect processors, entry logging and AJAX submissions.",
						sprintf( 'Caldera Forms is a free plugin %1s. We also offer a full range of %2s, including payment processors and service integrations.', cwp_theme_cf_wporg_link( 'you can download from WordPress.org' ), CWP_Theme_EDD::caldera_form_add_on_link() )
					)
				)
			),
			array(
				'title' => 'Other Plugins',
				'tagline' => 'Complex Tasks Made Easy',
				'title_link' => '#',
				'title_link_title' => 'Caldera Plugins: Complex Tasks Made Easy',
				'background' => 9,
				'background_style' => '',
				'content' => array(
					'p' => array(
						'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'
					)
				)
			),
			array(
				'title' => 'Caldera Answers',
				'tagline' => 'WordPress Development, The Right Way',
				'title_link' => '#',
				'title_link_title' => 'Caldera Answers: WordPress Development, The Right Way',
				'background' => 9,
				'background_style' => '',
				'content' => array(
					'p' => array(
						'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'
					)
				)
			)
		);
	}

}
