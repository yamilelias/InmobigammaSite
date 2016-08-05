<?php get_header(); ?>

<div class="row">

	<div class="wrapper">	

		<?php if ( get_theme_mod( 'realestatepro_sidebar_position', esc_attr__( 'right', 'realestatepro' ) ) == "left" )  

			{ echo '<div class="col-xs-12 col-sm-3 col-md-3 sidebar left-sidebar">'; }

		else

			{ echo '<div class="col-xs-12 col-sm-3 col-md-3 sidebar right-sidebar">'; }

		?>

			<?php get_sidebar(); ?>
		
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-9 feature">

			<div class="col-xs-12 col-sm-12 col-md-12 page-style">
				
				<?php 
				
				if( have_posts() ):
					
					while( have_posts() ): the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="col-xs-12 col-sm-12 col-md-12">
									<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
									<small>Mostrado en:<?php the_category(' '); ?>, por <?php the_author_link(); ?> en <?php the_time('F jS, Y'); ?></small>
								</div>
							
							<?php if( has_post_thumbnail() ): ?>
								
								<div class="col-xs-12 col-sm-12 col-md-12">
									<?php the_post_thumbnail('full'); ?>
								</div>
					
							<?php endif; ?>

							<div class="col-xs-12 col-sm-12 col-md-12 blog-article">
								<?php the_content(); ?>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<hr>
								<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
								<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<hr>
								<?php 
									if( comments_open() ){ 
										comments_template(); 
									} 								
								 ?>
							</div>

						</article>

					<?php endwhile;
					
				endif;
						
				?>
			
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>