<?php
/**
 * archive template for caldera answers
 *
 * @package CWP Theme
 * @since 0.1.0
 */
?>
<?php get_header(); ?>

	<div class="wrapper section-inner">

		<div class="content left">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="posts">

					<div class="post">

						<div class="post-header">



						</div> <!-- /post-header -->

						<div class="post-content">

							<h2 class="post-title">
								<?php
								$action = 'cwp_theme_load_single_caldera_answer';
								$atts = array(
									//'data-modal-title' => get_the_title(),
									'data-modal-height' => 400,
									'data-modal-width' => 300,
									'data-answer-id'   => get_the_id()
								);
								echo( calderawp\baldrick_wp_front_end\modal::make( $action, $atts,get_the_title() ) );
								?>
							</h2>


						</div> <!-- /post-content -->

					</div> <!-- /post -->

					<?php if ( comments_open() ) : ?>

						<?php comments_template( '', true ); ?>

					<?php endif; ?>

				</div> <!-- /posts -->

			<?php endwhile; else: ?>

				<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hemingway"); ?></p>

			<?php endif; ?>

			<div class="clear"></div>

		</div> <!-- /content left -->

		<?php get_sidebar(); ?>

		<div class="clear"></div>

	</div> <!-- /wrapper -->

<?php get_footer(); ?>
