<div class="col-xs-12 col-sm-12 col-md-12 blog-posts">

	<div class="col-xs-12 col-sm-12 col-md-12">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 blog-posts-excerpt">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php the_excerpt(); ?>
		<span class="meta">Publicado en <?php the_time('F jS, Y'); ?>, por <?php the_author_link(); ?><a class="post-link" href="<?php the_permalink(); ?>">Continuar leyendo &rarr;</a></span>

	</div>

</div>