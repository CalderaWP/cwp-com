
	<div class="credits section bg-dark no-padding">
	
		<div class="credits-inner section-inner">
	
			<p class="credits-left">
			
				&copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
			
			</p>
			
			<p class="credits-right">
				
				<span>
					<?php printf( __( 'Theme by <a href="%s">Anders Noren</a>', 'hemingway'), 'http://www.andersnoren.se' ); ?>
				</span> &mdash;
				<span>
					<?php printf( __( 'Child Theme by <a href="%s">Josh Pollock</a>', 'hemingway'), 'http://www.joshpress.net' ); ?>
				</span> &mdash;
				<a title="<?php _e('To the top', 'hemingway'); ?>" class="tothetop"><?php _e('Up', 'hemingway' ); ?> &uarr;</a>
			</p>
			
			<div class="clear"></div>
		
		</div> <!-- /credits-inner -->
		
	</div> <!-- /credits -->

</div> <!-- /big-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
