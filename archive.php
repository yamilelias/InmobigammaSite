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

				<?php if( have_posts() ): ?>

				<header class="page-header">
					<?php 

						the_archive_title('<h1 class="page-title">','</h1>');
						the_archive_description('<div class="taxonomy-description">', '</div>');

					 ?>
				</header>

					<?php while( have_posts() ): the_post(); ?>

						<?php get_template_part('content','archive'); ?>

					<?php endwhile; ?>

				<div class="navigation">
					<span class="newer"><?php previous_posts_link(__('« Posts más Recientes','example')) ?></span> <span class="older"><?php next_posts_link(__('Posts más Viejos »','example')) ?></span>
				</div><!-- /.navigation -->	

				<?php endif; ?>

		</div>
	</div>

</div>

<?php get_footer(); ?>