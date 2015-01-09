
<?php
/**
 * Front page template
 *
 * @package CWP Theme
 * @since 0.1.0
 */
get_header(); ?>

<div class="wrapper section-inner">						

	<div class="content front-page-content left">
		<div class="front-page-feature" <?php echo cwp_theme_background_style_tag( 8 ); ?>>
			<div class="title-wrap">
				<h5><a href="#" title="Caldera Forms">Caldera Forms</a> <span>Responsive Form Builder</span></h5>
			</div>
			<div class="clear"></div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
			</p>
		</div>

		<div class="front-page-feature" <?php echo cwp_theme_background_style_tag( 9 ); ?>>
			<div class="title-wrap">
				<h5><a href="#" title="Other Plugins">Other Plugins</a> <span>Complex Tasks Made Easy</span></h5>
			</div>
			<div class="clear"></div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
			</p>
		</div>

		<div class="front-page-feature" <?php echo cwp_theme_background_style_tag( 9 ); ?>>
			<div class="title-wrap">
				<h5><a href="#" title="Caldera Answers">Caldera Answers</a> <span>WordPress Development, The Right Way</span></h5>
			</div>
			<div class="clear"></div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis lacinia ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
			</p>
		</div>



	
	<div class="clear"></div>
		
	</div> <!-- /content left -->
	
	<?php get_sidebar(); ?>
	
	<div class="clear"></div>

</div> <!-- /wrapper -->
								
<?php get_footer(); ?>
