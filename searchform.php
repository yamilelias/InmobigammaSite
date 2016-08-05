<div class="realestatepro-widget-header">
	<h1>Búsqueda en el Blog</h1>

	<div class="realestatepro-widget-body">

			<form role="search" method="get" class="col-xs-12 col-sm-12 col-md-12 widget-form-width" id="blog-search-form" action="<?php echo home_url( '/' ); ?>">
				<label><span class="screen-reader-text"><?php echo _x( 'Buscar', 'label' ) ?></span></label>
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Buscar:', 'label' ) ?>" />
				<button type="submit" class="search-button" />Buscar</button>
			</form>

	</div>

</div>