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

					<div class="col-xs-12 col-sm-12-col-md-12">

						<p><?php the_content(); ?></p>

					</div>

					<?php endwhile;

				endif;

			?>

			</div>
			
		</div>

	</div>

</div>

<?php get_footer(); ?>