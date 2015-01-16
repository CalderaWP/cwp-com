<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<div class="sidebar right" role="complementary">
	
		<?php
			global $post;

			if ( CWP_Theme_EDD::is_edd_related( $post) ) {
				dynamic_sidebar( 'cwp-theme-edd-related' );
			}

			dynamic_sidebar( 'sidebar' );

		?>
		
	</div><!-- /sidebar -->

<?php endif; ?>
