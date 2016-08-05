<div class="featured-properties">

	<div class="col-xs-12 col-sm-12 col-md-4 listing-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php the_field('property_image_1');?>"></a>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-8 listings">

		<?php if (get_field('sale_or_rent')=='sale' ) { ?>

			<h3><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?></h3>
		
		<?php } else { ?>

			<h3><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?></h3>

		<?php } ?>

		<h3><a class="unstyledlink" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
		<h4><?php the_field('sub_title'); ?></h4>
		<p><?php the_field('property_details_excerpt'); ?></p>
		<?php echo sprintf('<a href="%s">Más detalles', esc_url( get_permalink() . '?' . $_SERVER['QUERY_STRING'] )),'</a>';?>

	</div>

</div>