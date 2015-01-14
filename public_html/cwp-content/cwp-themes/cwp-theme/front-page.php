
<?php
/**
 * Front page template
 *
 * @package CWP Theme
 * @since 0.1.0
 */
get_header(); ?>

<div class="wrapper section-inner" xmlns="http://www.w3.org/1999/html">

	<div class="content front-page-content full-width">
		<?php echo CWP_Front_Page::front_page_features(); ?>
	
	<div class="clear"></div>
		
	</div> <!-- /content left -->

	
	<div class="clear"></div>

</div> <!-- /wrapper -->
								
<?php get_footer(); ?>
