<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

			    <!-- Favicons
	    ================================================== -->
		<link rel="shortcut icon" href="<?php echo get_theme_mod('realestatepro_favicon'); ?>" type="image/x-icon" />

		<?php wp_head(); ?>
	</head>


<?php

	if (is_front_page() ):
		$realestatepro = array ( 'realestatepro-class', 'my-class' );
	else:
		$realestatepro = array ( 'no-realestatepro');
	endif;

?>

	<body <?php body_class( $realestatepro_classes ); ?>>


				<div id="top-banner">

					<div class="container">

						<div class="row">

							<div class="col-xs-12 col-sm-4 col-sm-offset-5 col-md-3 col-md-offset-7" id="top-banner-email">
								<span class="glyphicon glyphicon-envelope"></span><span><?php echo esc_html( get_theme_mod( 'realestatepro_top_banner_email', esc_attr__( 'contacto@inmobigama.com', 'realestatepro' ) ) ); ?></span>
							</div>

							<div class="col-xs-125 col-sm-3 col-md-2" id="top-banner-telephone">
								<span class="glyphicon glyphicon-phone"></span><span><?php echo esc_html( get_theme_mod( 'realestatepro_top_banner_telephone', esc_attr__( '6140000000', 'realestatepro' ) ) ); ?></span>
							</div>

						</div>

					</div>

				</div>

				<nav id="nav" class="navbar navbar-default">

					<div class="container">

						<div class="row">
		    
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      	<div class="logo">
						      		<a href="<?php echo get_home_url(); ?>">

						      			<?php $checklogo = get_theme_mod('realestatepro_logo'); 

						      				if ($checklogo) { ?>	

						      				    <img src="<?php echo esc_html( get_theme_mod( 'realestatepro_logo', esc_attr__( 'realestatepro/logo.png', 'realestatepro' ) ) ); ?>">

						      				<?php } else { ?>

												<img src="<?php echo bloginfo('template_url');?>/logo.png">

											<?php } ?>
						      		</a>
						      	</div>
						    </div>

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<!-- Wordpress menu creation-->
								<?php 
									wp_nav_menu(array(
										'theme_location' => 'primary',
										'container' => false,
										'menu_class' => 'nav navbar-nav navbar-right',
										'walker' => new Walker_Nav_Primary()
										)
									);
								?>
							</div>
					  
					  	</div>

					  </div><!-- /.container-fluid -->
					</nav>

				</div>



	<div class="container">