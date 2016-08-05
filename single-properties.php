<?php get_header(); ?>

<div class="row">
	
	<div class="wrapper">

		<?php if ( get_theme_mod( 'realestatepro_sidebar_position', esc_attr__( 'right', 'realestatepro' ) ) == "left" )  

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar left-sidebar">'; }

		else

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar right-sidebar">'; }

		?>

			<?php get_sidebar(); ?>
		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-9 feature">

			<div class="col-xs-12 col-sm-12 col-md-12 page-style">
				
				<?php 
				
				if( have_posts() ):
					
					while( have_posts() ): the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="col-xs-8 col-sm-6 col-md-6">
								<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
							</div>

							<div class="col-xs-4 col-sm-6 col-md-6"> 

								<?php
								    $ref_url = wp_get_referer();

									if (strpos($ref_url, 'min_val_buy') !== FALSE) ?>
									    <span><a href="#" class="back-to-search" onClick="javascript:window.history.back()">De vuelta a Resultados</a><span>
							</div>

							<div class="col-xs-12 col-sm-8 col-md-8 text-left">
								<h2><?php the_field('sub_title'); ?>,
							
								<?php if (get_field('sale_or_rent')=='sale' ) { ?>

									<?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?>
								
								<?php } else { ?>

									<?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?>

								<?php } ?>
							</h2>
							</div>

							<?php if(get_field('property_reference') ) 

							{?>
								<div class="col-xs-12 col-sm-4 col-md-4 text-right">
									<h2>Referencia: <?php the_field('property_reference'); ?></h2>
								</div>
							<?php } ?>

							<div class="col-xs-12 col-sm-12 col-md-12 property-image">
						        <div class="item">            
						            <div class="clearfix">
						                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
										<?php 	                    
										   for($i = 1; $i <= 15; $i++) {
										   if( get_field('property_image_'.$i) ) { ?>
										     <li data-thumb="<?php the_field('property_image_' . $i) ?>">
										     <img src="<?php the_field('property_image_' . $i) ?>" />
										     </li>
										   <?php }
											}
										?>
						                </ul>
						            </div>
						        </div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<ul class="property-features">
									<li>Cuartos: <?php the_field('number_of_bedrooms'); ?></li>
									<li>Baños: <?php the_field('number_of_bathrooms'); ?></li>
									<li>Salas: <?php the_field('number_of_reception_rooms'); ?></li>
									<li>
										<?php 
										if( get_field('parking') == 'yes') 
											{
												echo 'Estacionamiento: Si';
											}
										else { ?>
											Estacionamiento: No
										<?php } ?>	
									</li>
								</ul>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<h3>Detalles de la Propiedad</h3>
								<p><?php the_field('property_details'); ?></p>
							</div>					

							<?php if(get_field('amenities') ) 

							{?>

								<div class="col-xs-12 col-sm-12 col-md-12 ammenities">
									<h3>Comodidades</h3>
									<ul>
										<?php 
										$ammenities = explode(PHP_EOL, get_field('amenities'));
										foreach ($ammenities as $ammenity) {
										   echo '<li><span>'.$ammenity.'</span></li>';
										}
										?>
									</ul>
								</div>	

							<?php } ?>

							<?php if(get_field('agent') ) 

							{?>

								<div class="col-xs-12 col-sm-12 col-md-12">
									<h3>Detalles del Agente</h3>
									<p><?php the_field('agent'); ?></p>
								</div>	

							<?php } ?>

							<?php if(get_field('map') ) 

							{?>

								<div class="col-xs-12 col-sm-12 col-md-12">
									<h3>Ubicación</h3>
									<?php 

										$location = get_field('map');

										if( !empty($location) ):
										?>
										<div class="google-map">
											<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
										</div>
									<?php endif; ?>

								</div>

							<?php } ?>

						</article>

					<?php endwhile;
					
				endif;
						
				?>
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>