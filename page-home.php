<?php get_header(); ?>


<script>

(function($){

    jQuery(document).ready(function($) {
    $('#slider').nivoSlider({
     effect:'<?php echo get_theme_mod( 'realestatepro_nivo_slider_effect', esc_attr__( 'fade', 'realestatepro' ) ) ?>',
     slices: 5,
     animSpeed: 500,
     pauseTime: 5000,
     captionOpacity: 0.5,
     controlNav: false,
     directionNav: true,
     pauseonhover: true});
});

})(this.jQuery);

</script>

<style>

.theme-default .nivo-caption {
	display: <?php echo get_theme_mod( 'realestatepro_nivo_slider_captions', esc_attr__( 'none', 'realestatepro' ) ) ?>
}

</style>



</div>

		<div class="slider-wrapper theme-default">
			<div id="slider" class="nivoSlider"> 

	    		<?php 

				$slides = array (
					'post_type' 	 => 'slides',
					'posts_per_page' => -1,
				);

				$count=1;

				$slideshow = new WP_Query( $slides ); 

				while ( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
				
					<?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
	      
	                <a href="<?php the_field('slide_link'); ?>"><img src="<?php echo $feat_image_url; ?>" alt="<?php echo the_title(); ?>" title="#htmlcaption<?php echo $count ?>"/></a>

					<?php $count++; ?>

				<?php endwhile; ?>

			</div>

				<?php

				$count=1;

				while ( $slideshow->have_posts() ) : $slideshow->the_post(); ?>

					<div id="htmlcaption<?php echo $count ?>" class="nivo-html-caption">
					    
					    <a href="<?php the_field('slide_link'); ?>">

					    <div class="nivo-title">
					    	<?php echo the_title(); ?>
					    </div>
					    <div class="nivo-featured-text-1">
					    	<?php echo the_field('featured_text_1'); ?>
					    </div>					
					    <div class="nivo-featured-text-2">
					    	<?php echo the_field('featured_text_2'); ?>
					    </div>

						</a>

					</div>


					<?php $count++; ?>

				<?php endwhile;

			    wp_reset_query(); ?>

		</div>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
			
			<h1>Propiedades de búsqueda</h1>

				<div class="home-page-search-form">

					<?php 
						$formwidth 			= "home-form-width";
						$inputclass			= "homepage-format";
						$fullwidth 			= "col-xs-12 col-sm-4 col-md-4";
						$halfwidth 			= "col-xs-12 col-sm-12 col-md-6";
						$halfwidthmargin 	= "col-xs-12 col-sm-12 col-md-4 half-width-margin";    
						$buttonwidth 		= "col-xs-12 col-sm-4 col-md-4 topmargin";		

						property_search_form ( $formwidth, $inputclass, $fullwidth, $halfwidth, $halfwidthmargin, $buttonwidth ); 
					?>	

				</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 home-page-content">

			<?php the_content(); ?>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<hr>
			<h1>Últimas Propiedades a la Venta</h1>

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
						<h3><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?></h3>
						<h3><a class="unstyledlink" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_field('sub_title'); ?></a></h3>
						<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">Más detalles', esc_url( get_permalink() )),'</a>';?></p>
					</div>
			</div>

			<?php endwhile; 

			wp_reset_query(); ?>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<hr>
			<h1>Últimas Propiedades en Renta</h1>

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
					<h3><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?></h3>
					<h3><a class="unstyledlink" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_field('sub_title'); ?></a></h3>
					<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">More details', esc_url( get_permalink() )),'</a>';?></p>
				</div>

			</div>


			<?php endwhile; 

			wp_reset_query(); ?>

		</div>

	</div>

<?php get_footer(); ?>



