<?php
/**
 * CWP Theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package CWP Theme
 * @since 0.1.0
 */
 
// Useful global constants
define( 'CWP_THEME_VERSION', '0.1.0' );

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 */
function cwp_theme_setup() {
   /**
    * Makes CWP Theme available for translation.
    *
    * Translations can be added to the /lang directory.
    * If you're building a theme based on CWP Theme, use a find and replace
    * to change 'cwp_theme' to the name of your theme in all template files.
    */
   load_theme_textdomain( 'cwp_theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cwp_theme_setup' );

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since 0.1.0
 */
function cwp_theme_scripts_styles() {
   wp_deregister_style('hemingway_style' );

   wp_enqueue_style( 'hemingway_style', get_template_directory_uri() . "/style.css" );

   $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

   wp_enqueue_script( 'cwp_theme', get_stylesheet_directory_uri() . "/assets/js/cwp_theme{$postfix}.js", array(), CWP_THEME_VERSION, true );

   wp_localize_script( 'cwp_theme', 'cwp_theme', array( 'adminajax' => admin_url( 'admin-ajax.php') ) );

   wp_enqueue_style( 'cwp_theme', get_stylesheet_directory_uri() . "/assets/css/cwp_theme{$postfix}.css", array(), CWP_THEME_VERSION );




}
add_action( 'wp_enqueue_scripts', 'cwp_theme_scripts_styles', 55 );



/**
 * Add humans.txt to the <head> element.
 */
function cwp_theme_header_meta() {
   $humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';

   echo apply_filters( 'cwp_theme_humans', $humans );
}
add_action( 'wp_head', 'cwp_theme_header_meta' );

/**
 * Returns the post format of a post, or if its a CPT, will return post type
 *
 * @return false|mixed|string
 */
function cwp_theme_format_or_type() {
   $post_type = get_post_type();
   if ( 'post' != $post_type ) {
      return get_post_format();
   }else{
      return $post_type;
   }

}

/**
 * Add style tag for background image
 *
 * @param int|string $id Either the ID of an image to use or a URL
 * @param bool|string $extra_styles Optional. Additional styles to add.
 *
 * @return string
 */
function cwp_theme_background_style_tag( $id, $extra_styles = false ) {
   if ( intval( $id ) ) {
      $img = wp_get_attachment_image_src( $id );
      $img = $img[0];
   }else {
      $img = $id;
   }
   $style = 'style="background-image: url( '.  esc_url( $img ).');';

   if ( $extra_styles ) {
      $style .= $extra_styles;
   }

   $style .= '"';

   return $style;

}

/**
 * HTML markup for link to the WPORG page for CF
 *
 * @param bool|string $text Optionak
 *
 * @return string
 */
function cwp_theme_cf_wporg_link( $text = false) {
   if ( ! $text ) {
      $text = 'Caldera Forms';
   }

   return sprintf( '<a title="Caldera Forms WordPress.org Download Page" href="https://wordpress.org/plugins/caldera-forms/" target="_blank" >%1s</a>', $text );

}

/**
 * Include Dependencies.
 */
add_action( 'init', function() {
   include_once( dirname(__FILE__ ) . '/vendor/autoload.php' );
});

/**
 * Include other files
 */
add_action( 'init', function() {
   include( dirname( __FILE__ ) . '/includes/CWP_Theme_Caldera_Answers.php' );

   include( dirname( __FILE__ ) . '/includes/baldrick.php' );

   include( dirname( __FILE__ ) . '/includes/CWP_Front_Page_Data.php' );
   include( dirname( __FILE__ ) . '/includes/CWP_Front_Page.php' );

   include( dirname( __FILE__ ) . '/includes/CWP_Docs.php' );

   include( dirname( __FILE__ ) . '/includes/CWP_Social.php' );

});

/**
 * Disable comments on all post types besides post
 */
add_action( 'init', function() {
   $post_types = get_post_types( array( 'public' => true ) );
   foreach( $post_types as $post_type ) {
      if ($post_type == 'post' ) {
         continue;
      }

      if ( post_type_supports( $post_type, 'comments' ) ) {
         remove_post_type_support( $post_type, 'comments' );
      }

   }

   add_filter( 'comments_open', function( $open, $post )  {
      if ( 'post' != get_post_type( $post ) ) {
         $open = false;
      }

      return $open;
   },50, 2 );

});


/**
 * Register widget area to be used on EDD pages
*/
add_action( 'widgets_init', array( cwp_theme_get_edd_class(), 'edd_widget_area' ) );

function cwp_theme_get_edd_class() {
   include( dirname( __FILE__ ) . '/includes/CWP_Theme_EDD_Product_IDs.php' );
   include( dirname( __FILE__ ) . '/includes/CWP_Theme_EDD.php' );

   return \CWP_Theme_EDD::init();

}

/**
 * Randomize Caldera Answers Easy Pods results
 */
add_filter( 'caldera_easy_pods_query_params', function( $params, $pod, $tags, $easy_pod_slug ) {
   if ( 'caldera_answers' == $easy_pod_slug || 'answers_widget' == $easy_pod_slug ) {
      $params[ 'orderby' ] = 'rand()';
   }

   return $params;

}, 10, 4);


/**
 * Put an excerpt and additional markup on code snippets.
 */
add_filter( 'dsgnwrks_snippet_display', function( $snippet_html, $atts, $snippet ) {
   $excerpt = '';
   if ( $snippet->post_excerpt ) {
      $excerpt = sprintf( '<div class="code-snippet-description">%1s</div>', wpautop( $snippet->post_excerpt ) );
   }

   $html = sprintf( '<div class="cwp-code-snippet">%1s %2s </div>', $excerpt, $snippet_html );

   return $html;


}, 10, 3 );

/**
 * Hook into the_content
 */
add_action( 'init',
   function() {
      add_filter( 'the_content',
         function( $content ) {
            if ( is_page( CWP_Docs::$docs_page_id ) ) {
               $content = CWP_Docs::content_filter( $content );
            }

            return $content;

         },
      35 );

   },
35 );

/**
 * Remove EDD's microdata on post title in the "After Download" Pods Template
 */
add_filter( 'pods_templates_pre_template',
    function( $code, $template ) {
       if ( isset( $template[ 'name'] ) && 'After Download' == $template[ 'name'] ) {
          remove_filter( 'the_title', 'edd_microdata_title', 10, 2 );
       }

       return $code;

    }, 10, 2
);

/**
 * Re-enable EDD's microdata on post title after running the "After Download" Pods Template
 */
add_filter( 'pods_templates_post_template',
    function( $code, $template ) {
      if ( isset( $template[ 'name'] ) && 'After Download' == $template[ 'name'] ) {
         add_filter( 'the_title', 'edd_microdata_title', 10, 2 );
      }

       return $code;

   }, 10, 2
);

/**
 * Increase upload limits for admins
 */
add_filter( 'upload_size_limit', function( $limit ) {
   if ( current_user_can( 'edit_options' ) ) {
      return 8000000;

   }

   return $limit;

});

/**
 * Make a account/purchases/checkout pages a login or register form if not logged in or registered.
 */
add_filter( 'the_content', function( $content )  {
   global $post;
   if ( ! is_user_logged_in() && is_a( $post, 'WP_POST' ) && in_array( $post->ID, array( 4,5,6,7,) ) ) {
      $content = Caldera_Forms::render_form( 'CF54cdab1e3d906' );
   }

   return $content;

});

/**
 * Bio shortcode
 */
add_shortcode( 'cwp_bio', 'cwp_bio_shortcode' );
function cwp_bio_shortcode( $atts, $content = '' ) {
   $atts = shortcode_atts( array(
       'who' => 'david',
   ), $atts, 'cwp_bio' );


   return cwp_bio_box( $atts[ 'who' ], $content );
}

/**
 * Show a bio, with gravatar and social links.
 *
 * @param string $who Whose bio david|josh
 * @param string $bio The actual bio content.
 *
 * @return string|void
 */
function cwp_bio_box( $who, $bio ) {
   $data = CWP_Social::our_data( $who );

   if ( is_array( $data ) ) {
      $name = $data['name'];


      $social_html = CWP_Social::social_html( $data[ 'social' ], $name );

      $out[] = '<div class="about-box">';
      $out[] = sprintf( '<div class="about-left">%1s %2s</div>',
             '<div class="gravatar-box">' . get_avatar( $data['gravatar'] ) . '</div>',
             '<div class="social">' . $social_html . '</div>'
          );
      $out[] = '<div class="about-right"><div class="bio">'.$bio.'</div></div>';
      $out[] = '</div>';
      $out[] = '<div class="clear"></div>';

      $out = implode( '', $out );

      $out = str_replace( 'Pods Framework', '<a href="http://Pods.io" title="Pods -- WordPress Custom Content Types and Fields" target="_blank">Pods Framework</a>', $out );


      return $out;

   }


}

