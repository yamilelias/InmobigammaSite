<?php 

/*
     ==========================================
		Function to Populate Search Form
     ==========================================
*/ 

function popDropdown($str,$name,$default,$post = '')
{
	$i = 0;
	echo '<select name='.$name.' id='.$name.'>';
	echo ' <option value="">'.$default.'</option>';
	while($str[$i])
	{
	   if(!empty($post) && $post == $str[$i]) echo $option = '<option value="'.$str[$i].'" selected="selected">'.$str[$i].'</option>';
	   else{
	     echo $option = '<option value="'.$str[$i].'">'.$str[$i].'</option>';
	   }
	   $i++;
	}
	echo '</select>';
}

// <!-- Number of rooms in dropdown list -->
function roomsDropdown($name, $rooms_start, $rooms_end, $rooms_inc, $sel_rooms,$extra='',$unit=''){
	echo '<select name='.$name.' id='.$name.' '.$extra.'>';
	if($name == 'room_no_min')
	echo '<option value="0">Min</option>';
	else
	echo '<option value="100">Max</option>';
	
	for($i=$rooms_start; $i<=$rooms_end; $i+=$rooms_inc){
		if($i == $sel_rooms)
		echo '<option value="'.$i.'" SELECTED>'.number_format($i, 0, '.', ',').$unit.'</option>';
		else
		echo '<option value="'.$i.'">'.number_format($i, 0, '.', ',').$unit.'</option>';
	}
	echo '</select>';
}

// <!-- Values in price drop down list -->
function priceDropdown($name, $price_start, $price_end, $price_inc, $currency, $sel_price,$extra='',$unit=''){
	echo '<select name='.$name.' id='.$name.' '.$extra.'>';
	if($name == 'min_val_buy')
	echo '<option value="1">Min</option>';
	else
	echo '<option value="1000000000">Max</option>';
	
	for($i=$price_start; $i<=$price_end; $i+=$price_inc){
		if($i == $sel_price)
		echo '<option value="'.$i.'" SELECTED>'.$currency.number_format($i, 0, '.', ',').$unit.'</option>';
		else
		echo '<option value="'.$i.'">'.$currency.number_format($i, 0, '.', ',').$unit.'</option>';
	}
	echo '</select>';
}

// <!-- Values in rent drop down list -->
function priceDropdownRent($name, $price_start, $price_end, $price_inc, $currency, $sel_price,$extra='',$unit=''){
	echo '<select name='.$name.' id='.$name.' '.$extra.'>';
	if($name == 'min_val_rent')
	echo '<option value="1">Min</option>';
	else
	echo '<option value="1000000000">Max</option>';
	
	for($i=$price_start; $i<=$price_end; $i+=$price_inc){
		if($i == $sel_price)
		echo '<option value="'.$i.'" SELECTED>'.$currency.number_format($i, 0, '.', ',').'&nbsp;'.$unit.'</option>';
		else
		echo '<option value="'.$i.'">'.$currency.number_format($i, 0, '.', ',').'&nbsp;'.$unit.'</option>';
	}
	echo '</select>';
}


/*
     ==========================================
		Property Search Form
     ==========================================
*/ 
function property_search_form( $formwidth, $inputclass, $fullwidth, $halfwidth, $halfwidthmargin, $buttonwidth )     

{
		$search_page = esc_url( get_bloginfo( 'url' ))."/property-search-results/"; 
		
		echo '<form method="get" id="search-form" class="'.$formwidth.'" action="'.$search_page.'" >';

		( isset( $_GET['sort'] ) && $_GET['sort'] ) ? $sort = $_GET['sort'] : $sort = '';
		echo '<input type="hidden" name="sort" value="'.$sort.'">';

//		( isset( $_GET['price_sort'] ) && $_GET['price_sort'] ) ? $price_sort = $_GET['price_sort'] : $price_sort = '';
//		echo '<input type="hidden" name="price_sort" value="'.$price_sort.'">';


		// Location Label
		echo '<div class="'.$inputclass.' '.$fullwidth.'">';
			echo '<label>Ubicación</label>';
				( isset( $_GET['location'] ) && $_GET['location'] ) ? $location = $_GET['location'] : $location = '';
			// Location input
			echo '<input id="location" name="location" value="'.$location.'">';
		echo '</div>';


		// Property Type Label
//		$property_default_types = array('select', 'flat', 'house', 'mansion');

//	echo '<pre>';
//	var_dump(get_field_object('field_5669c4b43e76f'));
//	echo '</pre>';
	$property_default_types = array('Seleccionar');
	foreach(@get_field_object('field_5669c4b43e76f')['choices'] as $meta_k => $meta_v) {
		$property_default_types[] = $meta_k;
	}
		echo '<div class="'.$inputclass.' '.$fullwidth.'">';
			echo '<label>Tipo de Propiedad</label>';
			// Property Type Dropdown
			echo '<select name="type" id="type">';
				foreach( $property_default_types as $type ) {
					if( isset($_GET['type']) && $_GET['type'] == $type ) {
						echo '<option selected="selected" value="'.$_GET['type'].'">'.ucfirst( $_GET['type'] ).'</option>';
					}
					else {
						echo '<option value="'.$type.'">'.ucfirst($type).'</option>';
					}
				}
			echo '</select>';
		echo '</div>';


		// Buy or Rent Label
		$buy_rent_defaults = array('Seleccionar', 'Comprar', 'Rentar');
		echo '<div class="'.$inputclass.' '.$fullwidth.'">';
			echo '<label>Venta o Renta</label>';
			// By or Rent Dropdown 
			echo '<select name="buyrent" id="buyrent">';
				foreach($buy_rent_defaults as $type_buy_rent) {
					if( isset( $_GET['buyrent'] ) && $_GET['buyrent'] == $type_buy_rent ) {
						echo '<option selected="selected" value="'.$_GET['buyrent'].'">'.ucfirst($_GET['buyrent']).'</option>';
					}
					else {
						echo '<option value="'.$type_buy_rent.'">'.ucfirst($type_buy_rent).'</option>';
					}
				}
			echo '</select>';
		echo '</div>';


		 // Number of Bedrooms Label
		echo '<div class="'.$inputclass.' '.$fullwidth.'">';
			echo '<label>Recámaras</label>';
			// Number of Bedrooms Dropdown
			echo '<div class="'.$halfwidth.' no-margin ">';			
					roomsDropdown('room_no_min',1,10,1,$_GET['room_no_min'],'class="smalldropdown-first" ');
				echo '</div>';			
			echo '<div class="'.$halfwidth.' no-margin ">';	
					roomsDropdown('room_no_max',1,10,1,$_GET['room_no_max'],'class="smalldropdown" ');
				echo '</div>';
		echo '</div>';


		 // Price or Rent
		echo '<div class="'.$inputclass.' '.$fullwidth.'">';		
			echo '<label>Precio/Renta</label>';
			 // Dropdown for Price
			echo '<div id="rsbuy">';
				echo '<div class="'.$halfwidth.' no-margin ">';
							priceDropdown('min_val_buy',
								$GLOBALS['theme_settings']['buy_min_price'],
								$GLOBALS['theme_settings']['buy_max_price'],
								$GLOBALS['theme_settings']['buy_increments'],
								$GLOBALS['theme_settings']['currency'],
								$_GET['min_val_buy'],
								'class="smalldropdown-first" ');
				echo '</div>';
				echo '<div class="'.$halfwidth.' no-margin ">';
							priceDropdown('max_val_buy',
								$GLOBALS['theme_settings']['buy_min_price'],
								$GLOBALS['theme_settings']['buy_max_price'],
								$GLOBALS['theme_settings']['buy_increments'],
								$GLOBALS['theme_settings']['currency'],
								$_GET['max_val_buy'],
								'class="smalldropdown" ');
				echo '</div>';
			echo '</div>';
		echo '</div>';


		// Dropdown for Rent
		echo '<div id="rsrent">';
			echo '<div class="'.$halfwidth.'">';	
					priceDropdownRent('min_val_rent',
						$GLOBALS['theme_settings']['rent_min'],
						$GLOBALS['theme_settings']['rent_max'],
						$GLOBALS['theme_settings']['rent_increments'],
						$GLOBALS['theme_settings']['currency'],
						$_GET['min_val_rent'],
						'class="smalldropdown-first" ',
						$GLOBALS['theme_settings']['rental_period']);
			echo '</div>';

			echo '<div class="'.$halfwidth.'">';	
					priceDropdownRent('max_val_rent',
						$GLOBALS['theme_settings']['rent_min'],
						$GLOBALS['theme_settings']['rent_max'],
						$GLOBALS['theme_settings']['rent_increments'],
						$GLOBALS['theme_settings']['currency'],
						$_GET['max_val_rent'],
						'class="smalldropdown" ',
						$GLOBALS['theme_settings']['rental_period']);		
			echo '</div>';
		echo '</div>';


		// Submit Button
		echo '<div class="'.$buttonwidth.'">';		
			echo '<button type="submit" class="search-button">Buscar</button> ';
		echo '</div>';

		echo '</form>';
}


/*
     ==========================================
		Property Search Function
     ==========================================
*/ 
function property_search () 
	{ 
		$location = preg_replace('/^-|-$|[^-a-zA-Z0-9]/', '', $_GET['location']); 
		$type = preg_replace('/^-|-$|[^-a-zA-Z0-9]/', '', $_GET['type']); 
		$buyrent = preg_replace('/^-|-$|[^-a-zA-Z0-9]/', '', $_GET['buyrent']); 

		$room_no_min = preg_replace('/[^0-9]/', '', $_GET['room_no_min']);
		$room_no_max = preg_replace('/[^0-9]/', '', $_GET['room_no_max']);

		// This replaces characters in the input string if need be for security reasons 
		$min_val_buy = ( isset( $_GET['min_val_buy'] ) ) ? $_GET['min_val_buy'] : $_GET['min_val_rent'];
		$max_val_buy = ( isset( $_GET['max_val_buy'] ) ) ? $_GET['max_val_buy'] : $_GET['max_val_rent'];

		$min_val_rent = $_GET['min_val_rent'];
		$max_val_rent = $_GET['max_val_buy'];


		$meta_query = array( 'relation' => 'AND' );
		if($location) {
			$meta_query[] = array(
				'relation' => 'OR',
				array(
					'key' => 'property_country',
					'value' => $location,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'property_city',
					'value' => $location,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'property_location',
					'value' => $location,
					'compare' => 'LIKE'
				)
			);
		}

		if($type != 'select') {
			$meta_query[] = array(
				'key' => 'property_type',
				'value' => $type,
				'compare' => '='
			);
		}

		if($buyrent != 'select') {
			if($buyrent == 'buy') $buyrent = 'sale'; // select value "buy" differs in context from met_value "sale"
			$meta_query[] = array(
				'key' => 'sale_or_rent',
				'value' => $buyrent,
				'compare' => '='
			);
		}

		$meta_query[] = array(
			'key' => 'number_of_bedrooms',
			'value' => intval($room_no_min),
			'type' => 'numeric',
			'compare' => '>='
		);

		$meta_query[] = array(
			'key' => 'number_of_bedrooms',
			'value' => intval($room_no_max),
			'type' => 'numeric',
			'compare' => '<='
		);

		$meta_query[] = array(
			'key' => 'property_price',
			'value' => intval($min_val_buy),
			'type' => 'numeric',
			'compare' => '>='
		);

		$meta_query[] = array(
			'key' => 'property_price',
			'value' => intval($max_val_buy),
			'type' => 'numeric',
			'compare' => '<='
		);

		// Property search query goes here

		$args = array(
			'post_type' => 'properties',
			'meta_query' => $meta_query
		);

		if( isset( $_GET['sort'] ) ) {
			if($_GET['sort'] == 'newest') {
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';
			}
			if($_GET['sort'] == 'oldest') {
				$args['orderby'] = 'date';
				$args['order'] = 'ASC';
			}
			if($_GET['sort'] == 'price highest') {
				$args['meta_key'] = 'property_price';
				$args['orderby'] = 'meta_value_num';
				$args['order'] = 'DESC';
			}
			if($_GET['sort'] == 'price lowest') {
				$args['meta_key'] = 'property_price';
				$args['orderby'] = 'meta_value_num';
				$args['order'] = 'ASC';
			}
		}

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args['paged'] = $paged;

		$results = new WP_Query( $args );

		if(($results == 0) || ($results == false) || ($results == NULL) || !is_object($results) || !($results->have_posts())) {
			return $results;
            }
		else {
			return $results;
            }
	
} // END OF MYSEARCH


?>