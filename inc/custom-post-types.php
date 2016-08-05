<?php

/*
     ==========================================
		Custom Post Type - Properties
     ==========================================
*/
function realestatepro_properties_post_type () {

	$labels = array (
		'name' 					=> 'Propiedades',
		'singular_name' 		=> 'Propiedades',
		'add_new' 				=> 'Agregar Propiedad',
		'add_new_item' 			=> 'Agregar Propiedad',
		'edit_item' 			=> 'Editar Propiedad',
		'new_item' 				=> 'Nueva Propiedad',
		'view_item' 			=> 'Ver Propiedad',
		'search_item' 			=> 'Buscar Propiedad',
		'not_found' 			=> 'No se encontraron Propiedades',
		'not_found_in_trash' 	=> 'No se encontraron elementos en la basura',
		'parent_item_colon' 	=> 'Elemento Padre',
		);		
	$args = array (
		'show_in_menu'			=> true,
		'labels'			 	=> $labels,
		'public' 				=> true,
		'has_archive' 			=> true,
		'publicly_queryable' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_icon'				=> 'dashicons-admin-home',
		'supports'				=> array (
			'title',
			//'editor',
			//'excerpt',
			//'thumbnail',
			'revisions',
		),
		//'taxonomies' 			=> array('category', 'post_tag'),
		'menu_position' 		=> 5,
		'exclude_from_search' 	=> false
	);
	register_post_type('properties',$args);

}
add_action('init','realestatepro_properties_post_type');



/*
     ==========================================
		Custom Post Type - Featured Properties
     ==========================================
*/
function realestatepro_featured_properties_post_type () {

	$labels = array (
		'name' 					=> 'Destacado',
		'singular_name' 		=> 'Destacado',
		'add_new' 				=> 'Agregar Propiedad Destacada',
		'add_new_item' 			=> 'Agregar Propiedad Destacada',
		'edit_item' 			=> 'Editar Propiedad Destacada',
		'new_item' 				=> 'Nueva Propiedad Destacada',
		'view_item' 			=> 'Ver Propiedad Destacada',
		'search_item' 			=> 'Buscar Propiedades Destacadas',
		'not_found' 			=> 'No se encotnraron Propiedades Destacadas',
		'not_found_in_trash' 	=> 'No se encontraron elementos en la basura',
		'parent_item_colon' 	=> 'Elemento Padre',
	);		
	$args = array (
		'labels'			 	=> $labels,
		'show_in_menu'			=> true,
		'public' 				=> true,
		'has_archive' 			=> true,
		'publicly_queryable' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_icon'				=> 'dashicons-star-empty',		
		'supports'				=> array (
			'title',
			//'editor',
			//'excerpt',
			//'thumbnail',
			'revisions',
		),
		//'taxonomies' 			=> array('category', 'post_tag'),
		'menu_position' 		=> 5,
		'exclude_from_search' 	=> false
	);
	register_post_type('featured',$args);

}
add_action('init','realestatepro_featured_properties_post_type');



/*
     ==========================================
		Custom Post Type - Slider
     ==========================================
*/
function realestatepro_slides_post_type () {

	$labels = array (
		'name' 					=> 'Diapositivas',
		'singular_name' 		=> 'Diapositivas',
		'add_new' 				=> 'Agregar Diapositiva',
		'add_new_item' 			=> 'Agregar Diapositiva',
		'edit_item' 			=> 'Editar Diapositiva',
		'new_item' 				=> 'Nueva Diapositivas',
		'view_item' 			=> 'Ver Diapositiva',
		'search_item' 			=> 'Buscar Diapositivas',
		'not_found' 			=> 'No se encontraron Diapositivas',
		'not_found_in_trash' 	=> 'No se encontraron elementos en la basura',
		'parent_item_colon' 	=> 'Elemento Padre',
	);		
	$args = array (
		'labels'			 	=> $labels,
		'show_in_menu'			=> true,
		'public' 				=> true,
		'has_archive' 			=> true,
		'publicly_queryable' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_icon'				=> 'dashicons-slides',	
		'supports'				=> array (
			'title',
			//'editor',
			//'excerpt',
			'thumbnail',
			'revisions',
		),
		//'taxonomies' 			=> array('category', 'post_tag'),
		'menu_position' 		=> 5,
		'exclude_from_search' 	=> false
	);
	register_post_type('slides',$args);

}
add_action('init','realestatepro_slides_post_type');




/*
     ==========================================
		Custom Page - Property Search Results
     ==========================================
*/


/**
 * @returns -1 if the post was never created, -2 if a post with the same title exists, or the ID
 *          of the post if successful.
 */
function programmatically_create_post() {

	// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = 1;
	$slug = 'property-search-results';
	$title = 'Resultados de la Búsqueda de Propiedad';

	// If the page doesn't already exist, then create it
	if( null == get_page_by_title( $title ) ) {

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page'
			)
		);

	// Otherwise, we'll stop
	} else {

    		// Arbitrarily use -2 to indicate that the page with the title already exists
    		$post_id = -2;

	} // end if

} // end programmatically_create_post

add_filter( 'after_setup_theme', 'programmatically_create_post' );

?>