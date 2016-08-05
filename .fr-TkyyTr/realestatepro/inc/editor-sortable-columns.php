<?php

/* Functions to add columns to the Properties post type and make them sortable*/

add_action( 'current_screen', 'display_sortable_columns' );

function display_sortable_columns() {

	$currentScreen = get_current_screen();

    if( $currentScreen->post_type === "properties" ) {

    add_filter('manage_posts_columns', 'admin_properties_head');
	add_action('manage_posts_custom_column', 'admin_columns_content', 10, 2);
	add_filter('manage_edit-properties_sortable_columns', 'admin_sortable_columns_properties' );

    }

}


/* Functions to add columns to the Properties post type */
function admin_properties_head($defaults) {

		$defaults['property_city'] = 'Ciudad';
		$defaults['property_location'] = 'Ubicación';
		$defaults['property_postal_code'] = 'Código Postal';
		$defaults['sale_or_rent'] = 'Venta/Renta';
		$defaults['property_type'] = 'Tipo';
		$defaults['number_of_bedrooms'] = 'Habitaciones';
		$defaults['property_price'] = 'Precio';
		$defaults['date_listed'] = 'Día Enlistado';
		return $defaults;

}


function admin_columns_content($column_name, $post_id) {

		if ($column_name == 'property_city') {
			$column_value = get_post_meta($post_id, 'property_city', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'property_location') {
			$column_value = get_post_meta($post_id, 'property_location', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'property_postal_code') {
			$column_value = get_post_meta($post_id, 'property_postal_code', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'sale_or_rent') {
			$column_value = get_post_meta($post_id, 'sale_or_rent', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'property_type') {
			$column_value = get_post_meta($post_id, 'property_type', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'number_of_bedrooms') {
			$column_value = get_post_meta($post_id, 'number_of_bedrooms', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'property_price') {
			$column_value = get_post_meta($post_id, 'property_price', true);
			if ($column_value) echo $column_value;
		}
		if ($column_name == 'date_listed') {
			$column_value = get_post_meta($post_id, 'date_listed', true);
			if ($column_value) {
				$column_value = substr_replace( substr_replace($column_value, '.', 4, 0), '.', 7, 0 );
				echo $column_value;
			}
		}
	}





/* Functions to make the columns in the Properties post type sortable */
function admin_sortable_columns_properties( $columns ) {
	$columns['property_city'] = 'property_city';
	$columns['property_location'] = 'property_location';
	$columns['property_postal_code'] = 'property_postal_code';
	$columns['sale_or_rent'] = 'sale_or_rent';
	$columns['property_type'] = 'property_type';
	$columns['number_of_bedrooms'] = 'number_of_bedrooms';
	$columns['property_price'] = 'property_price';
	$columns['date_listed'] = 'date_listed';
	return $columns;
}

add_action( 'pre_get_posts', 'admin_properties_sortable' );

function admin_properties_sortable( $query ) {
	if( ! is_admin() )
		return;

	$orderby = $query->get( 'orderby');

	switch($orderby) {
		case 'property_price':
			$query->set('meta_key','property_price');
			$query->set('orderby','meta_value_num');
			break;
		case 'property_location':
			$query->set('meta_key','property_location');
			$query->set('orderby','meta_value');
			break;
		case 'property_postal_code':
			$query->set('meta_key','property_postal_code');
			$query->set('orderby','meta_value');
			break;
		case 'sale_or_rent':
			$query->set('meta_key','sale_or_rent');
			$query->set('orderby','meta_value');
			break;
		case 'property_type':
			$query->set('meta_key','property_type');
			$query->set('orderby','meta_value');
			break;
		case 'number_of_bedrooms':
			$query->set('meta_key','number_of_bedrooms');
			$query->set('orderby','meta_value_num');
			break;

		case 'property_price':
			$query->set('meta_key','property_price');
			$query->set('orderby','meta_value_num');
			break;

		case 'date_listed':
			$query->set('meta_key','date_listed');
			$query->set('orderby','meta_value_num');
			break;
	}

}

?>