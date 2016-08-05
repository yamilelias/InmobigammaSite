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

	        <?php query_posts('post_type=post&paged='. get_query_var('paged')); ?>

			<?php if( have_posts() ): ?>

		<div class="col-xs-12 col-sm-12 col-md-9 blog-archive feature">

		        <?php while( have_posts() ): the_post(); ?>

					<?php get_template_part('content','archive'); ?>

		        <?php endwhile; ?>

				<div class="navigation">
					
					<div class="col-xs-6 col-sm-6 col-md-6 blog-paginate-newer">
						<?php previous_posts_link(__('« Nuevos Posts','example')) ?>
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6 blog-paginate-older">
						<?php next_posts_link(__('Viejos Posts»','example')) ?>
					</div>

				</div><!-- /.navigation -->	

		</div>

			<?php else: ?>

				<div class="col-xs-12 col-sm-12 col-md-9 page-style">

				    <h1>Blog Posts</h1>
				    <p>No hay post de blog por ahora.</p>

			    </div>

			<?php endif; wp_reset_query(); ?>

	</div>

</div>

<?php get_footer(); ?>