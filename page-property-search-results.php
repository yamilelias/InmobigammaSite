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

		<?php if ( ($_GET['location'] == '') && ($_GET['type'] == '') && ($_GET['buyrent'] == '') && ($_GET['min_val'] == '') && ($_GET['room_no_min'] == '') ) 

		{  
			// if all the input fields are empty, then redirect to the home page
			
				$redirect = get_home_url();
				header('location:'.$redirect); 
		
		} else { ?> 

				<?php
				$loop = property_search ();
				$propertiesfound = $loop->found_posts;
				?>

				<?php if ( $propertiesfound == 0 ) { ?>
				
				<div class="col-xs-12 col-sm-12 col-md-9 page-style feature">

					<h1>Ninguna propiedad concuerda con tu búsqueda</h1>
					<h4>Trata de agrandar tus criterios para poder agrandar los resultados.</h4>

					<hr>
					<h4>Propiedades Destacadas</h4>
				
					<?php

					$sale_properties = array (
						'post_type' 	 => 'featured',
						'posts_per_page' => 4,
					);

					$featured_buys = new WP_Query( $sale_properties );

					while ( $featured_buys->have_posts() ) : $featured_buys->the_post(); 
					
						$post_object = get_field('featured_property');
							if( $post_object ): 

							// override $post
							$post = $post_object;
							setup_postdata( $post ); 

							?>

						<div class="col-xs-12 col-sm-6 col-md-3 no-margin-left">

							<div class="featured-properties">
								<div style="position: relative;">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php the_field('property_image_1');?>"></a>
									<span class="featuredlabel"><?php the_title(); ?></span>
								</div>				
							
								<?php if (get_field('sale_or_rent')=='sale' ) { ?>

									<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?></h4>
								
								<?php } else { ?>

									<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?></h4>

								<?php } ?>

								<h4><a class="unstyledlink" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_field('sub_title'); ?></a></h4>
								<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">More details', esc_url( get_permalink() )),'</a>';?></p>
	 						
	 						</div>

						</div>

					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif;

					endwhile; 

					wp_reset_query(); ?>

				</div>

				<?php  } else { ?>

				<div class="col-xs-12 col-sm-12 col-md-9 feature" id="search-results">

					<h1 class="pagetitle"><?php the_title(); ?></h1> 

					<div id="search-results-container-tools">
						
						<div id="search-results-container-results">
							
							<?php if ($propertiesfound > 1 ) { ?>

								<p><?php echo $propertiesfound ?> Propiedades concuerdan con tus criterios.</p>
								
							<?php } else { ?>

								<p><?php echo $propertiesfound ?> Propiedades concuerdan con tus criterios.</p>
								
							<?php } ?>

						</div>

						<div id="search-results-container-sort">
							<form id="listings-sort" action="" method="post">
								<label for="listing-results-sort">Ordenar por</label>
								<select name="listing-results-sort-options" id="listing-results-sort-options">
									<?php $date_sort_defaults = array('select', 'newest', 'oldest', 'price highest', 'price lowest');
									foreach($date_sort_defaults as $default) {
										if( isset($_GET['sort']) && $_GET['sort'] == $default ) {
											echo '<option selected="selected" value="'.$_GET['sort'].'">'.ucfirst($_GET['sort']).'</option>';
										}
										else {
											echo '<option value="'.$default.'">'.ucfirst($default).'</option>';
										}
									} ?>
								</select>
							</form>
						</div>
					</div>
				
					<?php

					if( $loop->have_posts() ): 

						while( $loop->have_posts() ): $loop->the_post(); ?>
							<?php get_template_part('content','listings'); ?>
						<?php endwhile; ?>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<hr>
								<?php realestatepro_pagination($loop->max_num_pages, 1) ?>
							</div>
						</div>

				<?php endif; } ?>

		<?php } ?>

	</div>

</div>

<?php get_footer(); ?>