<?php get_header(); ?>

<div class="wrapper section-inner">

	<div class="content left">
												        
		<?php if (have_posts()) : while (have_posts()) : the_post();  global $post; ?>
		
			<div class="posts">
		
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<div class="post-header">

						<?php if ( has_post_thumbnail() ) : ?>
					
							<div class="featured-media">
							
								<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark" title="<?php esc_attr( $post->post_title ); ?>">
								
									<?php the_post_thumbnail('post-image'); ?>

								</a>
										
							</div> <!-- /featured-media -->
								
						<?php endif; ?>
						

					    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr( $post->post_title ); ?>"><?php the_title(); ?></a></h2>
					    
					    <div class="post-meta">
							<?php echo CWP_Theme_EDD::related_products_box( $post->ID ); ?>
						</div>
					    
					</div> <!-- /post-header -->
														                                    	    
					<div class="post-content">
						    		            			            	                                                                                            
						<?php the_content(); ?>
								
						<?php wp_link_pages(); ?>
									        
					</div> <!-- /post-content -->
					            
					<div class="clear"></div>
					
					<div class="post-meta-bottom">

												

											
					</div> <!-- /post-meta-bottom -->

												                        
			   	<?php endwhile; else: ?>
			
					<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hemingway"); ?></p>
				
				<?php endif; ?>    
		
			</div> <!-- /post -->
			
		</div> <!-- /posts -->
	
	</div> <!-- /content -->
	
	<?php get_sidebar(); ?>
	
	<div class="clear"></div>
	
</div> <!-- /wrapper -->
		
<?php get_footer(); ?>
