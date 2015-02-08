<?php
	$data =  cwp_theme_plugin_data();
$atts = $data->header_atts;
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >



																		
		<title><?php wp_title('|', true, 'right'); ?></title>
				
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<div class="big-wrapper">
	
			<div class="header-cover section bg-dark-light no-padding" style="background-image: url(<?php echo esc_url( $atts[ 'header_bg' ] ); ?>);background-repeat: no-repeat; background-position: 50%;background-size: 30%;background-color: #0A7A6F;">

				<div id="home" class="top">
					<div class="container">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 logo">
							<?php echo $data->logo; ?>
						</div>
						<!--Navigation-->
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-right ">
							<div class="nav">
								<?php echo $data->menu(); ?>
							</div>
						</div>
					</div>
				</div>


			</div> <!-- /bg-dark -->

	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="product-description">
			<?php
				echo sprintf( '<h2>%2s</h2>', $atts[ 'tagline' ] );
			?>
		</div>
	</div>

				

