<?php get_header(); ?>

	<h2>Oh oh, hubo un error tratando de encontrar la página que buscas. ¿No es alguna de estas? O puedes intentar una búsqueda.</h2>
	<hr>

</div>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
			
			<h2>Buscar Propiedades</h2>

				<div class="home-page-search-form">

					<?php 
						$formwidth 			= "home-form-width";
						$inputclass			= "homepage-format";
						$fullwidth 			= "col-xs-12 col-sm-12 col-md-4";
						$halfwidth 			= "col-xs-12 col-sm-12 col-md-6";
						$halfwidthmargin 	= "col-xs-12 col-sm-12 col-md-4 half-width-margin";    
						$buttonwidth 		= "col-xs-12 col-sm-12 col-md-4 topmargin";		

						property_search_form ( $formwidth, $inputclass, $fullwidth, $halfwidth, $halfwidthmargin, $buttonwidth ); 
					?>	

				</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<hr>
			<h2>Últimas Propiedades a la Venta</h2>

			<?php 

			$sale_properties = array (
				'post_type' 	 => 'properties',
				'posts_per_page' => 4,
				'meta_key'		=> 'sale_or_rent',
				'meta_value'	=> 'sale'
			);

			$featured_buys = new WP_Query( $sale_properties );

			while ( $featured_buys->have_posts() ) : $featured_buys->the_post(); ?>
			
			<div class="col-xs-12 col-sm-6 col-md-3 no-margin-left">

					<div class="featured-properties">
						<div style="position: relative;">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php the_field('property_image_1');?>"></a>
							<span class="featuredlabel"><?php the_title(); ?></span>
						</div>				
						<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?></h4>
						<h4><?php the_field('sub_title'); ?></h4>
						<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">More details', esc_url( get_permalink() )),'</a>';?></p>
					</div>
			</div>

			<?php endwhile; 

			wp_reset_query(); ?>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<hr>
			<h2>Últimas Propiedades a la Renta</h2>

			<?php 

			$sale_properties = array (
				'post_type' 	 => 'properties',
				'posts_per_page' => 4,
				'meta_key'		=> 'sale_or_rent',
				'meta_value'	=> 'rent'
			);

			$featured_buys = new WP_Query( $sale_properties );

			while ( $featured_buys->have_posts() ) : $featured_buys->the_post(); ?>
			
			<div class="col-xs-12 col-sm-6 col-md-3 no-margin-left">

				<div class="featured-properties">
					<div style="position: relative;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php the_field('property_image_1');?>"></a>
						<span class="featuredlabel"><?php the_title(); ?></span>
					</div>	
					<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?></h4>
					<h4><?php the_field('sub_title'); ?></h4>
					<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">Más Detalles', esc_url( get_permalink() )),'</a>';?></p>
				</div>

			</div>


			<?php endwhile; 

			wp_reset_query(); ?>

		</div>

	</div>

<?php get_footer(); ?>



