	<div class="footer section bg-dark">
		<div class="footer-inner section-inner">
			<?php
			$defaults = array(
				'menu'            => 'Footer',
				'container'       => 'div',
				'container_class' => '',
				'container_id'    => 'footer-menu-wrap',
				'menu_class'      => 'menu',
				'menu_id'         => 'footer-menu',
				'echo'            => true,
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

			);

			wp_nav_menu( $defaults );
			?>
		</div>

		<div class="credits section bg-dark no-padding">

			<div class="credits-inner section-inner">

				<p class="credits-left">

					<span>
						Site &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="CalderaWP LLC">CalderaWP LLC</a>
					</span>
					<span> &mdash; <a href="https://github.com/CalderaWP/cwp-com/" title="Source Code For This Site">Source</a></span>
				</p>

				<p class="credits-right">

					<span>
						<?php printf( __( 'Theme by <a href="%s">Anders Noren</a>', 'hemingway'), 'http://www.andersnoren.se' ); ?>
					</span> &mdash;
					<span>
						<?php printf( __( 'Child Theme by <a href="%s">Josh Pollock</a>', 'cwp-com'), 'http://www.joshpress.net' ); ?>
					</span> &mdash;
					<a title="<?php _e('To the top', 'hemingway'); ?>" class="tothetop"><?php _e('Up', 'hemingway' ); ?> &uarr;</a>
				</p>

				<div class="clear"></div>

			</div> <!-- /credits-inner -->

		</div> <!-- /credits --></>
	</div>

</div> <!-- /big-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
