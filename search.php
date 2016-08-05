<?php get_header(); ?>

	<div class="wrapper">	

		<?php if ( get_theme_mod( 'realestatepro_sidebar_position', esc_attr__( 'right', 'realestatepro' ) ) == "left" )

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar left-sidebar">'; }

		else

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar right-sidebar">'; }

		?>

			<?php get_sidebar(); ?>
		
		</div>

		<?php if ( have_posts() ) : ?>

		<div class="col-xs-12 col-sm-12 col-md-9 blog-archive feature">

			<h1 class="blog-search-results-page-title"><?php printf( __( 'Mostrando resultados para: %s', 'realestatepro' ), get_search_query() ); ?></h1>
			
			<?php

			while ( have_posts() ) : the_post(); ?>

				<?php

				get_template_part( 'content', 'archive' );

			endwhile;

			the_posts_pagination( array(
				'prev_text'          => __( 'Página anterior', 'realestatepro' ),
				'next_text'          => __( 'Siguiente página', 'realestatepro' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'realestatepro' ) . ' </span>',
			) );
		
		else : ?>

				<div class="col-xs-12 col-sm-12 col-md-9 page-style">

					<h1>No hay resultados de búsqueda</h1>
					<p><?php printf( __( 'Tú búsqueda por %s', 'realestatepro' ), get_search_query() ); ?> no tiene ningún resultado, trata de ampliar tu búsqueda.</p>
			    </div>

		<?php endif;
		?>

		</div>

	</div>

<?php get_footer(); ?>





























<?php get_footer(); ?>
