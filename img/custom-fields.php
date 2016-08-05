<?php 

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_contact-page',
		'title' => 'Página de Contacto',
		'fields' => array (
			array (
				'key' => 'field_56869213ffcdc',
				'label' => 'Correo de Contacto',
				'name' => 'contact_email_address',
				'type' => 'email',
				'instructions' => 'Ingresa el correo electrónico a donde serán enviados los datos del formulario.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_56869330ffcdd',
				'label' => 'Asunto del Correo de Contacto',
				'name' => 'contact_email_subject_message',
				'type' => 'text',
				'instructions' => 'Este es el texto que será mostrado en la línea de Asunto cuando recibas un nuevo correo de un visitante usando la forma de contacto, incluye el nombre de tu sitio.',
				'default_value' => 'Tienes un nuevo correo de tu Sitio Web',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5686935fffcde',
				'label' => 'Dirección de Contacto',
				'name' => 'contact_address',
				'type' => 'text',
				'instructions' => 'Ingresa tu dirección de contacto.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56869383ffcdf',
				'label' => 'Dirección en el Mapa',
				'name' => 'map',
				'type' => 'google_map',
				'instructions' => 'Encuentra tu dirección.',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_featured-properties',
		'title' => 'Propiedades Detacadas',
		'fields' => array (
			array (
				'key' => 'field_5676f86d83e09',
				'label' => 'Propiedades Destacadas',
				'name' => 'featured_property',
				'type' => 'post_object',
				'instructions' => 'Selecciona la propiedad que te gustaría tener como destacado en el sitio.',
				'required' => 1,
				'post_type' => array (
					0 => 'properties',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'featured',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_footer',
		'title' => 'Footer',
		'fields' => array (
			array (
				'key' => 'field_567ab9250ce0d',
				'label' => 'Contenido de bloques de pie de página',
				'name' => '',
				'type' => 'message',
				'message' => '<div style="background-color:#FFD5BF;color:#000000;padding:15px;">A pesar de que puedes crear muchas páginas con los bloques para el pie de página,es la página más reciente la cual será usada para el pie de página del sitio.</div>',
			),
			array (
				'key' => 'field_567ab0433df31',
				'label' => 'Número de bloques de contenido del pie de página',
				'name' => 'number_of_footer_content_block',
				'type' => 'select',
				'instructions' => 'Selecciona el número de bloques del contenido de pie de página que será usado.
	Nota: Si escoges 1 bloque va a tener el ancho completo del footer, si escoges dos bloques entonces cada uno tendrá 50%, .',
				'required' => 1,
				'choices' => array (
					'one' => 'Un Bloque',
					'two' => 'Dos Bloques',
					'four' => 'Cuatro Bloques',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_567aa61724924',
				'label' => 'Footer Content 1',
				'name' => 'footer_content_1',
				'type' => 'wysiwyg',
				'instructions' => 'Enter the content for the first content block in the footer.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '==',
							'value' => 'one',
						),
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '==',
							'value' => 'two',
						),
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '==',
							'value' => 'four',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_567aa6eb24925',
				'label' => 'Footer Content 2',
				'name' => 'footer_content_2',
				'type' => 'wysiwyg',
				'instructions' => 'Enter the content for the second content block in the footer.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '!=',
							'value' => 'one',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_567aa70424926',
				'label' => 'Footer Content 3',
				'name' => 'footer_content_3',
				'type' => 'wysiwyg',
				'instructions' => 'Enter the content for the third content block in the footer.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '==',
							'value' => 'four',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_567aa71924927',
				'label' => 'Footer Content 4',
				'name' => 'footer_content_4',
				'type' => 'wysiwyg',
				'instructions' => 'Enter the content for the fourth content block in the footer.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_567ab0433df31',
							'operator' => '==',
							'value' => 'four',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'footer-content.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_property-details',
		'title' => 'Detalles de la Propiedad',
		'fields' => array (
			array (
				'key' => 'field_5669f2be5a1de',
				'label' => 'Sub título',
				'name' => 'sub_title',
				'type' => 'text',
				'instructions' => 'Ingresa un subtítulo, ejemplo: El título inicial debe mostrar la ubicación de la propiedad y el subtítulo mostrar la cantidad de número de cuartos y la ciudad.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669ccf97f378',
				'label' => 'Referencias de la Propiedad',
				'name' => 'property_reference',
				'type' => 'text',
				'instructions' => 'Ingresa la referencia de esta propiedad.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669d31bd373a',
				'label' => 'Día de Registro',
				'name' => 'date_listed',
				'type' => 'date_picker',
				'instructions' => 'Ingresa el día en el que la propiedad fue registrada.',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5669d350d373b',
				'label' => 'Día de Expiración',
				'name' => 'date_listing_expires',
				'type' => 'date_picker',
				'instructions' => 'Escoge la fecha en la cual desees que la propiedad no se muestre más.',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5669c46d3e76e',
				'label' => 'Precio de la Propiedad',
				'name' => 'property_price',
				'type' => 'number',
				'instructions' => 'Ingresa el precio de la propiedad, ya sea el precio de venta o de renta. Sólo ingresa números, no simbolos, comas o espacios. La configuración de la moneda se encuentra en Apariencia>Personalizar>Configuraciones>Moneda',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5669d1671e86d',
				'label' => 'Venta o Renta',
				'name' => 'sale_or_rent',
				'type' => 'select',
				'instructions' => 'Ingresa su esta propiedad está a la venta o en renta.',
				'required' => 1,
				'choices' => array (
					'sale' => 'Venta',
					'rent' => 'Renta',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5669c4b43e76f',
				'label' => 'Tipo de Propiedad',
				'name' => 'property_type',
				'type' => 'select',
				'instructions' => 'Selecciona el tipo de propiedad de la Lista.',
				'required' => 1,
				'choices' => array (
					'house' => 'Casa',
					'townhouse' => 'Adosado',
					'flat' => 'Flat',
					'condo' => 'Condominio',
					'apartment' => 'Apartmento',
					'penthouse' => 'Penthouse',
					'mansion' => 'Mansion',
					'estate' => 'Hacienda',
					'bungalow' => 'Bungalow',
					'studio flat' => 'Estudio Flat',
					'maisonette' => 'Departamento',
					'lodge' => 'Cabaña',
					'commercials' => 'Comercial',
					'studio' => 'Estudio',
					'farm' => 'Granja',
					'garage' => 'Garaje',
					'shared_room' => 'Sólo un cuarto',
					'student' => 'Casa de Asistencia',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5669cac905b8a',
				'label' => 'Tamaño de la propiedad',
				'name' => 'property_size',
				'type' => 'text',
				'instructions' => 'Favor de ingresar el tamaño de la propiedad, haciendo mención de las unidades, ejemplo: metros, yardas, etc.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669c6513e770',
				'label' => 'País',
				'name' => 'property_country',
				'type' => 'text',
				'instructions' => 'Menciona el país donde se ubica la propiedad.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669c68d3e771',
				'label' => 'Ciudad',
				'name' => 'property_city',
				'type' => 'text',
				'instructions' => 'Ingresa la ciudad donde se encuentra la propiedad.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669c6f63750d',
				'label' => 'Código Postal',
				'name' => 'property_postal_code',
				'type' => 'text',
				'instructions' => 'Please enter the specific postal code of the property, e.g. zip code, post code or area code.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669c6c83750c',
				'label' => 'Ubicación de la Propiedad',
				'name' => 'property_location',
				'type' => 'text',
				'instructions' => 'Ingresa la ubiación de la propiedad. Ésta puede ser un área, camino o poblado. Esto aparecerá al principio del listado.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5669cbc8ac5eb',
				'label' => 'Extracto de Detalles de la Propiedad',
				'name' => 'property_details_excerpt',
				'type' => 'text',
				'instructions' => 'Por favor ingresa una pequeña descripción de la propiedad, ésta aparecerá en las páginas resultados y áreas destacadas',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 1024,
			),
			array (
				'key' => 'field_5669cc01ac5ec',
				'label' => 'Detalles de la Propiedad',
				'name' => 'property_details',
				'type' => 'wysiwyg',
				'instructions' => 'Ingresa los detalles de la propiedad.',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5669c32c3e76a',
				'label' => 'Número de Habitaciones',
				'name' => 'number_of_bedrooms',
				'type' => 'number',
				'instructions' => 'Por favor ingresa el número de habitaciones.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_5669c35d3e76b',
				'label' => 'Número de Baños',
				'name' => 'number_of_bathrooms',
				'type' => 'number',
				'instructions' => 'Por favor ingresa el número de baños.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 0.5,
			),
			array (
				'key' => 'field_5669c3a13e76c',
				'label' => 'Número de Salas de Estar',
				'name' => 'number_of_reception_rooms',
				'type' => 'number',
				'instructions' => 'Ingresa el númer de salas de estar.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_5669c3d53e76d',
				'label' => 'Estacionamiento',
				'name' => 'parking',
				'type' => 'select',
				'instructions' => '¿La propiedad tiene estacionamiento?',
				'required' => 1,
				'choices' => array (
					'yes' => 'Si',
					'no' => 'No',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5669d2207094e',
				'label' => 'Comodidades',
				'name' => 'amenities',
				'type' => 'textarea',
				'instructions' => 'Favor de ingresar las comodidaes que esta propiedad tiene, Please enter the amenities that this property has, e.g. nearest train station, schools, parks. Once ammenity per line, upto 8 lines.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 8,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5669d2907094f',
				'label' => 'Mapa',
				'name' => 'map',
				'type' => 'google_map',
				'instructions' => 'Ingresa los detalles de la ubicación para Google Maps.',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
			array (
				'key' => 'field_5669cb0a05b8b',
				'label' => 'Agente',
				'name' => 'agent',
				'type' => 'wysiwyg',
				'instructions' => 'Nombre y detalles de Contacto del Agente que represenya esta propiedad.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_566b155bc47ea',
				'label' => 'Foto Principal',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5669eea115b5c',
				'label' => 'Imagen 1 de la propiedad',
				'name' => 'property_image_1',
				'type' => 'image',
				'instructions' => 'Por favor selecciona la imagen principal para el listado de la propiedad. Este es un campo obligatorio, si no tienes una imagen entonces necesitarás subir una imagen de marcador.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_566b15a57a426',
				'label' => 'Imagen 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_566b1092af75e',
				'label' => 'Imagen 2 de la Propiedad',
				'name' => 'property_image_2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_566b15fe2b4bc',
				'label' => 'Imagen 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_566b10a5af75f',
				'label' => 'Imagen 3 de la Propiedad',
				'name' => 'property_image_3',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_566b16072b4bd',
				'label' => 'Imagen 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_566b10b1af760',
				'label' => 'Imagen 4 de la Propiedad',
				'name' => 'property_image_4',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_566b160e2b4be',
				'label' => 'Imagen 5',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_566b10beaf761',
				'label' => 'Imagen 5 de la Propiedad',
				'name' => 'property_image_5',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c0ab027c6',
				'label' => 'Imagen 6',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0bc027c7',
				'label' => 'Imagen 6 de la Propiedad',
				'name' => 'property_image_6',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c11d027d1',
				'label' => 'Imagen 7',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0ce027c8',
				'label' => 'Imagen 7 de la Propiedad',
				'name' => 'property_image_7',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c123027d2',
				'label' => 'Imagen 8',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0d8027c9',
				'label' => 'Imagen 8 de la Propiedad',
				'name' => 'property_image_8',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c128027d3',
				'label' => 'Imagen 9',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0e3027ca',
				'label' => 'Imagen 9 de la Propiedad',
				'name' => 'property_image_9',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c12d027d4',
				'label' => 'Imagen 10',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0eb027cb',
				'label' => 'Imagen 10 de la Propiedad',
				'name' => 'property_image_10',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c132027d5',
				'label' => 'Imagen 11',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0f4027cc',
				'label' => 'Imagen 11 de la Propiedad',
				'name' => 'property_image_11',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c137027d6',
				'label' => 'Imagen 12',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c0fd027cd',
				'label' => 'Imagen 12 de la Propiedad',
				'name' => 'property_image_12',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c13c027d7',
				'label' => 'Imagen 13',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c104027ce',
				'label' => 'Imagen 13 de la Propiedad',
				'name' => 'property_image_13',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c142027d8',
				'label' => 'Imagen 14',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c10c027cf',
				'label' => 'Imagen 14 de la Propiedad',
				'name' => 'property_image_14',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b8c146027d9',
				'label' => 'Imagen 15',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_56b8c113027d0',
				'label' => 'Imagen 15 de la Propiedad',
				'name' => 'property_image_15',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'properties',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'Discusión',
				1 => 'Comentarios',
				2 => 'Revisiones',
				3 => 'Autor',
				4 => 'Formato',
				5 => 'Enviar-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_slideshow',
		'title' => 'Slideshow',
		'fields' => array (
			array (
				'key' => 'field_568d2eef37237',
				'label' => 'Texto Destacado 1',
				'name' => 'featured_text_1',
				'type' => 'text',
				'instructions' => 'Ingresa el texto principal para la diapositiva. Longitud Recomendada: una línea.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_568d2f2537238',
				'label' => 'Texto Destacado 2',
				'name' => 'featured_text_2',
				'type' => 'text',
				'instructions' => 'Ingresa el texto para la segunda línea debajo del Texto Principal. Longitud Recomendada: 1-2 palabras.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56744a49f3579',
				'label' => 'Link de la Diapositiva',
				'name' => 'slide_link',
				'type' => 'text',
				'instructions' => 'Por favor ingresa un link si quieres que la imagen lleve al usuario a otra página, debe estar en formato http://www.thedomain.com/page.html o similar.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


?>