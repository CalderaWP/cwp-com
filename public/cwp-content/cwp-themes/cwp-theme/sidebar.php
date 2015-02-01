<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<div class="sidebar right" role="complementary">
	
		<?php

			echo CWP_Social::cwp_social_pseudo_widget();
			global $post;

			if ( CWP_Theme_EDD::is_edd_related( $post) ) {
				dynamic_sidebar( 'cwp-theme-edd-related' );
			}else{
				dynamic_sidebar( 'sidebar' );
			}

		?>
		
	</div><!-- /sidebar -->

<?php endif; ?>
