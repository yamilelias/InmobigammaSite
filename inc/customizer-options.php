<?php

/*
     ==========================================
		Options for Theme Customizer
     ==========================================
*/ 

 if ( ! class_exists( 'Kirki' ) ) {
     include_once( dirname( __FILE__ ) . '/kirki/kirki.php' );
 }

function kirki_update_url( $config ) {

    $config['url_path']     = get_stylesheet_directory_uri() . '/inc/kirki/';
    return $config;

}
add_filter( 'kirki/config', 'kirki_update_url' );


if ( class_exists( 'Kirki' ) ) {


	/* Add sections */

	/* Add a Section for RealEstatePro settings */
	Kirki::add_section( 'realestatepro_settings', array(
		'title'          => esc_attr__( 'Configuraciones Inmobigama', 'realestatepro' ),
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Editar configuraciones para Inmobigama', 'realestatepro' ),
	) );

	/* Add a Section for Site Text Colors */
	Kirki::add_section( 'realestatepro_text', array(
		'title'          => esc_attr__( 'Text Options', 'realestatepro' ),
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Editar el texto y el color de los links de tu sitio.', 'realestatepro' ),
	) );

	/* Add a Section for Button Colors */
	Kirki::add_section( 'realestatepro_button_colors', array(
		'title'          => esc_attr__( 'Color de los botónes', 'realestatepro' ),
		'priority'       => 2,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Cambiar los colores de los botones', 'realestatepro' ),
	) );

	/* Add a Section for Top Banner */
	Kirki::add_section( 'realestatepro_top_banner', array(
		'title'          => esc_attr__( 'Contenido y Estilo del Banner Superior', 'realestatepro' ),
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Editar los contenidos y estilos del Banner Superior.', 'realestatepro' ),
	) );

	/* Add a Section for Navigation Menu */
	Kirki::add_section( 'realestatepro_nav_menu', array(
		'title'          => esc_attr__( 'Estilo del Menú de Navegación', 'realestatepro' ),
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Editar el estilo del Menú de Navegación.', 'realestatepro' ),
	) );

	/* Add a Section for the Nivo Slider */
	Kirki::add_section( 'realestatepro_nivo_slider', array(
		'title'          => esc_attr__( 'Configuración Nivo Slider', 'realestatepro' ),
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Cambiar las configuraciones del Nivo Slider.', 'realestatepro' ),
	) );

	/* Add a Section for Search Settings */
	Kirki::add_section( 'realestatepro_search_settings', array(
		'title'          => esc_attr__( 'Configuraciones de Búsqueda', 'realestatepro' ),
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Cambiar las configuraciones de los resultados de Búsqueda.', 'realestatepro' ),
	) );

	/* Add a Section for Widgets and Sidebars */
	Kirki::add_section( 'realestatepro_widgets_sidebars', array(
		'title'          => esc_attr__( 'Estilos del Widgets y la Barra Lateral', 'realestatepro' ),
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Cambiar las configuraciones de los Widgets y la Barra Lateral.', 'realestatepro' ),
	) );

	/* Add a Section for Footer Content */
	Kirki::add_section( 'realestatepro_footer', array(
		'title'          => esc_attr__( 'Contenido y Estilo del Footer', 'realestatepro' ),
		'priority'       => 4,
		'capability'     => 'edit_theme_options',
	    'description' => __( 'Edit los estilos y contenidos del Footer', 'realestatepro' ),
	) );

	/**
	 * Add the configuration.
	 * This way all the fields using the 'realestatepro_settings' ID
	 * will inherit these options
	 */
	Kirki::add_config( 'realestatepro_settings', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );


/* Fields for RealEstatePro Settings -------------------------------------------------------------------------------------*/

	/* Add a field to change the site logo */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'upload',
		'settings'    => 'realestatepro_logo',
		'label'       => esc_attr__( 'Logo', 'realestatepro' ),
		'default'     => esc_attr__( '', 'realestatepro' ),
		'section'     => 'realestatepro_settings',
		'description' => esc_attr__( 'Selecciona el Logo de tu Sitio. No debe ser más largo de 30x250 px, en formato PNG o JPG.', 'realestatepro' ),
		'priority'    => 10,
	) );

	/* Add a field to change the site favicon */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'upload',
		'settings'    => 'realestatepro_favicon',
		'label'       => esc_attr__( 'Favicon', 'realestatepro' ),
		'default'     => esc_attr__( '', 'realestatepro' ),
		'section'     => 'realestatepro_settings',
		'description' => esc_attr__( 'Seleccionar el favicon de tu Sitio. Debe estar en formato ICO.', 'realestatepro' ),
		'priority'    => 10,
	) );
	
	/* Add a field to change background picture/color */
	/*Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'upload',
		'settings'    => 'realestatepro_background',
		'label'       => esc_attr__( 'Fondo del Sitio', 'realestatepro' ),
		'default'     => esc_attr__( '', 'realestatepro' ),
		'section'     => 'realestatepro_settings',
		'description' => esc_attr__( 'Selecciona la imagen que deseas que aparezca como el fondo del sitio. Si no eliges alguno se pondrá un color por default.', 'realestatepro' ),
		'priority'    => 10,
			'output' => array(
			array(
				'element' => 'body',
				'property' => 'background',
				'suffix' => '!important',
				'prefix' => 'fixed',
			),
		),
	) );*/

	/* Continue with the field to change color */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_background_color',
		'label'       => esc_attr__( 'Color de fondo del Sitio', 'realestatepro' ),
		'default'     => '#cacaca',
		'section'     => 'realestatepro_settings',
		'description' => esc_attr__( 'Selecciona el color que deseas que aparezca como el fondo del sitio.', 'realestatepro' ),
		'priority'    => 11,
		'output' => array(
			array(
				'element' => 'body',
				'property' => 'background',
			),
		),
	) );

	/* Add a field to add analytics tracking code to the footer */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'code',
		'settings'    => 'realestatepro_analytics',
		'label'       => esc_attr__( 'Código de Análisis', 'realestatepro' ),
		'section'     => 'realestatepro_settings',
		'help'		  => esc_attr__( 'Ingresa cualquier código de análisis, por ejemplo Google Analytics.', 'realestatepro' ),
		'description' => esc_attr__( 'Ingresa el código de análisis.', 'realestatepro' ),
		'priority'    => 12,
			'choices'     => array(
	        'language' => 'javascript',
	        'theme'    => 'default',
	        'height'   => 250,
    ),
	) );

	/* Add a field to add conversion tracking code to confirmation page */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'code',
		'settings'    => 'realestatepro_conversion',
		'label'       => esc_attr__( 'Código de Conversión', 'realestatepro' ),
		'section'     => 'realestatepro_settings',
		'help'		  => esc_attr__( 'Ingresa cualquier código de rastreo, por ejemplo Google AdWords.', 'realestatepro' ),
		'description' => esc_attr__( 'Ingresa el código de rastreo.', 'realestatepro' ),
		'priority'    => 12,
			'choices'     => array(
	        'language' => 'javascript',
	        'theme'    => 'default',
	        'height'   => 250,
    ),
	) );


/* Fields for Site Text Options -------------------------------------------------------------------------------------*/

   	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'typography',
		'settings'    => 'realestate_typography',
		'label'       => esc_attr__( 'Tipografía', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona la tipografía que deseas utilizar en tu sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_text',
		'default'     => array(
			'font-family'    => 'Arial',
		),
		'priority'    => 10,
		'choices'     => array(
			'font-family'     => true,
		),
		'output' => array(
			array(
				'element' => 'body',
			),
		),
	) );

    /* Add a field to change the body text color in the Text Colors Section */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_body_color',
		'label'       => esc_attr__( 'Color del Body', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color del body principal de tu sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_text',
		'default'     => '#333333',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'body, p',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body, p',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

    /* Add a field to change the normal link color */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_links_color',
		'label'       => esc_attr__( 'Color de los Links', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color de los links en su estado normal.', 'realestatepro' ),
		'section'     => 'realestatepro_text',
		'default'     => '#D9DADB',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'a, a:active',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'a, a:active',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

    /* Add a field to change the hover link color */   /* NOT WORKING -----------------------------------*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_links_hover_color',
		'label'       => esc_attr__( 'Color de Hover en Links', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona un color para los links cuando el ratón pase por encima de los mismos.', 'realestatepro' ),
		'section'     => 'realestatepro_text',
		'default'     => '#23527c',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'a:hover, a:focus',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'a:hover, a:focus',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );


/* Fields for Button Colors -------------------------------------------------------------------------------------*/

    /* Add a field to change the background color of the button in the site */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_button_background_color',
		'label'       => esc_attr__( 'Color de Fondo de los botones', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona un color para el fondo de los botones en el sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_button_colors',
		'default'     => '#5d0208',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '.standard-button,.search-button,.mortgage-calculator-button',
				'property' => 'background-color',
			),
			array(
				'element' => 'scrollUpButton',
				'property' => 'background'
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.standard-button,.search-button,.mortgage-calculator-button',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

    /* Add a field to change the color of the button in the site */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_button_text_color',
		'label'       => esc_attr__( 'Color de Texto del Botón', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge un color para el texto de los botones en el sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_button_colors',
		'default'     => '#ffffff',
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '.search-button,.mortgage-calculator-button',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.search-button,.mortgage-calculator-button',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );


/* Fields for Top Banner -------------------------------------------------------------------------------------*/

    /* Add a field to change the top banner background color */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_top-banner_color',
		'label'       => esc_attr__( 'Color de Banner Superior', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge el color para el área del banner superior de tu sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_top_banner',
		'default'     => '#CFCFD0',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '#top-banner',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '#top-banner',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );

    /* Add a field to change the top banner text color */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_top-banner_text_color',
		'label'       => esc_attr__( 'Color del Texto del Banner Superior', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge el color del texto para el área del Banner Superior de tu Sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_top_banner',
		'default'     => '#000000',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '#top-banner-email span, #top-banner-telephone span',
                'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '#top-banner-email span, #top-banner-telephone span',
                'function' => 'css',
                'property' => 'color',
			),
		),
	) );

    /* Add a field to change the top banner email address */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'text',
		'settings'    => 'realestatepro_top_banner_email',
		'label'       => esc_attr__( 'Correo del Banner Superior', 'realestatepro' ),
		'description' => esc_attr__( 'Ingresa el correo que se va a mostrar en el Banner Superior.', 'realestatepro' ),
		'default'     => esc_attr__( 'contacto@inmobigama.com', 'realestatepro' ),
		'section'     => 'realestatepro_top_banner',
		'priority'    => 10,
	) );

    /* Add a field to change the top banner telephone number */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'text',
		'settings'    => 'realestatepro_top_banner_telephone',
		'label'       => esc_attr__( 'Teléfono del Banner Superior', 'realestatepro' ),
		'description' => esc_attr__( 'Ingresa el número de teléfono que quieres que se muestre en el Banner Superior.', 'realestatepro' ),
		'default'     => esc_attr__( '614 000 0000', 'realestatepro' ),
		'section'     => 'realestatepro_top_banner',
		'priority'    => 10,
	) );


/* Fields for Nav Menu ---------------------------------------------------------------------------------------------------*/

    /* Add a field to change the background color of the navigation menu */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_nav_menu_background_color',
		'label'       => esc_attr__( 'Color de Fondo del Menú de Navegación', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge el color del fondo del menú de navegación.', 'realestatepro' ),
		'section'     => 'realestatepro_nav_menu',
		'default'     => '#FFFFFF',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.navbar-default',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.navbar-default',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );


    /* Add a field to change the background color of the navigation menu hover state */   /* NOT WORKING -----------------------------------*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_nav_menu_hover_color',
		'label'       => esc_attr__( 'Color de Fondo del Rollover del Menú de Navegación', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge el color del fondo del Rollover del menú de navegación.', 'realestatepro' ),
		'section'     => 'realestatepro_nav_menu',
		'default'     => '#cacaca',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.navbar-default .navbar-nav > li > a:hover',
                'property' => 'background-color',
                'transport' => 'refresh,'
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.navbar-default .navbar-nav > li > a:hover',
                'function' => 'css',
                'property' => 'background-color',
                'transport' => 'refresh,'
			),
		),
	) );


    /* Add a field to change the background color of the navigation active hover state */   /* NOT WORKING -----------------------------------*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_nav_menu_active_color',
		'label'       => esc_attr__( 'Color de Fondo del Menú Activo', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge el color thel fondo para la sección del menú que se encuentre activa.', 'realestatepro' ),
		'section'     => 'realestatepro_nav_menu',
		'default'     => '#808080',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );

/* Fields for Nivo Slider ---------------------------------------------------------------------------------------------------*/

    /* Add a field to change transition settings for the Nivo Slider */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'select',
		'settings'    => 'realestatepro_nivo_slider_effect',
		'label'       => esc_attr__( 'Nivo Slider Transition Effect', 'realestatepro' ),
		'description' => esc_attr__( 'Choose the transition effect of the the slider.', 'realestatepro' ),
		'section'     => 'realestatepro_nivo_slider',
		'default'     => 'fade', 
		'priority'    => 10,
	    'choices'     => array(
	        'fade' 					=> __( 'Desvanecer', 'realestatepro' ),
	        'fold' 					=> __( 'Doblar', 'realestatepro' ),
	        'sliceDown' 			=> __( 'CortarAbajo', 'realestatepro' ),
	        'sliceDownLeft'			=> __( 'CortarAbajoIzquierda', 'realestatepro' ),
 			'sliceUp' 				=> __( 'CortarArriba', 'realestatepro' ),
	        'sliceUpLeft' 			=> __( 'CortarArribaIzquierda', 'realestatepro' ),
 			'sliceUpDown' 			=> __( 'CortarArribaAbajo', 'realestatepro' ),
	        'sliceUpDownLeft' 		=> __( 'CortarArribaAbajoIzquierda', 'realestatepro' ),
 			'slideInRight' 			=> __( 'CortarEnDerecha', 'realestatepro' ),
	        'slideInLeft' 			=> __( 'CortarEnIzquierda', 'realestatepro' ),
 			'boxRandom' 			=> __( 'BoxAleatorio', 'realestatepro' ),
	        'boxRain' 				=> __( 'LluviaBox', 'realestatepro' ),
 			'boxRainReverse' 		=> __( 'LluviaBoxReversa', 'realestatepro' ),
	        'boxRainGrow' 			=> __( 'LluviaBoxCrecer', 'realestatepro' ),
 			'boxRainGrowReverse' 	=> __( 'LluviaBoxCrecerReversa', 'realestatepro' ),
    ),

	) );


    /* Add a field to change caption settings for the Nivo Slider */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'select',
		'settings'    => 'realestatepro_nivo_slider_captions',
		'label'       => esc_attr__( 'Subtítulos del Nivo Slider', 'realestatepro' ),
		'description' => esc_attr__( 'Escoge cuando desees desplegar Subtítulos.', 'realestatepro' ),
		'section'     => 'realestatepro_nivo_slider',
		'default'     => 'none!important', 
		'priority'    => 10,
	    'choices'     => array(
	        'none!important' => __( 'Esconder', 'kirki' ),
	        'block' 		 => __( 'Mostrar', 'kirki' ),

    ),

	) );

/* Fields for Search Settings ---------------------------------------------------------------------------------------------------*/

    
	/* Add a field to change currency symbol used in the site */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'text',
		'settings'    => 'realestatepro_currency',
		'label'       => esc_attr__( 'Moneda', 'realestatepro' ),
		'default'     => esc_attr__( '$', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa el símbolo de la moneda que desees utilizar en el sitio.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the property rental period */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'text',
		'settings'    => 'realestatepro_rental_period',
		'label'       => esc_attr__( 'Periodo de Renta', 'realestatepro' ),
		'default'     => esc_attr__( 'ps', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'help'		  => esc_attr__( 'Por Ejemplo, si deseas que la cantidad de la renta sea por semana (ps) o por mes (pm).', 'realestatepro' ),
		'description' => esc_attr__( 'Ingresa el periodo de renta que quieres utilizar en el sitio.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the minimum purchase price in the search form */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_buy_min_price',
		'label'       => esc_attr__( 'Precio Mínimo de la Compra', 'realestatepro' ),
		'default'     => esc_attr__( '100000', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa el precio mínimo de compra de las propiedades para usar en el formulario de búsqueda.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the maximum purchase price in the search form */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_buy_max_price',
		'label'       => esc_attr__( 'Precio Máximo de Compra', 'realestatepro' ),
		'default'     => esc_attr__( '2000000', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa el precio Máximo de Compra para las propiedades en el formulario de búsqueda.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the increments used in the search form for purchases */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_buy_increments',
		'label'       => esc_attr__( 'Valor incremental de la compra', 'realestatepro' ),
		'default'     => esc_attr__( '25000', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa el incremento que deseas usar en el precio de compra de las propiedades en el formulario de búsqueda.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the minimum rent in the search form */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_rent_min',
		'label'       => esc_attr__( 'Renta Mínima', 'realestatepro' ),
		'default'     => esc_attr__( '1000', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa la renta mínima de las propiedades para usar en el formulario de búsqueda.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the maximum rent in the search form */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_rent_max',
		'label'       => esc_attr__( 'Renta Máxima', 'realestatepro' ),
		'default'     => esc_attr__( '20000', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa la renta máxima de las propiedades para usar en el formulario de búsqueda.', 'realestatepro' ),
		'priority'    => 10,
	) );


	/* Add a field to change the increments used in the search form for renting */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'number',
		'settings'    => 'realestatepro_rent_increments',
		'label'       => esc_attr__( 'Valor Incremental de la Renta', 'realestatepro' ),
		'default'     => esc_attr__( '250', 'realestatepro' ),
		'section'     => 'realestatepro_search_settings',
		'description' => esc_attr__( 'Ingresa el incremental que deseas utilizar para los formularios de búsqueda de las rentas.', 'realestatepro' ),
		'priority'    => 10,
	) );


/* Fields for Widgets and Sidebar---------------------------------------------------------------------------------------------------*/

   /* Add a to allow the user to select sidebar position, left or right */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'select',
		'settings'    => 'realestatepro_sidebar_position',
		'label'       => esc_attr__( 'Posición de la barra lateral', 'realestatepro' ),
		'section'     => 'realestatepro_widgets_sidebars',
		'default'     => 'right', 
		'description' => esc_attr__( 'Selecciona si deseas que la barra lateral se ubique en la posición derecha o en la izquierda de la página.', 'realestatepro' ),
		'priority'    => 10,
	    'choices'     => array(
	        'right' 		=> __( 'Derecha - Default', 'realestatepro' ),
	        'left' 			=> __( 'Izquierda', 'realestatepro' ),
		
    ),
	) );

    /* Add a field to change the background color of widget headings */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_widget_header_background_color',
		'label'       => esc_attr__( 'Color de Fondo del Encabezado del Widget', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color para el fondo del encabezado del Widget.', 'realestatepro' ),
		'section'     => 'realestatepro_widgets_sidebars',
		'default'     => '#f7f7f7', 
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.realestatepro-widget-header',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.realestatepro-widget-header',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );

    /* Add a field to change the text color of widget headings*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_widget_header_text_color',
		'label'       => esc_attr__( 'Color del Texto del Encabezado del Widget', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color para el texto del encabezado del Widget.', 'realestatepro' ),
		'section'     => 'realestatepro_widgets_sidebars',
		'default'     => '#333333', 
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.realestatepro-widget-header h1',
                'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.realestatepro-widget-header h1',
                'function' => 'css',
                'property' => 'color',
			),
		),
	) );

    /* Add a field to change the border color of widgets*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_widget_border_color',
		'label'       => esc_attr__( 'Color del Borde del Widget', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color para el borde del Widget.', 'realestatepro' ),
		'section'     => 'realestatepro_widgets_sidebars',
		'default'     => '#EEEEEE', 
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.realestatepro-widget-header',
                'property' => 'border-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.realestatepro-widget-header',
                'function' => 'css',
                'property' => 'border-color',
			),
		),
	) );

    /* Add a field to change the bodey background color of widget headings*/
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_widget_background_color',
		'label'       => esc_attr__( 'Color del Fondo del Widget', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color para el fondo del Widget.', 'realestatepro' ),
		'section'     => 'realestatepro_widgets_sidebars',
		'default'     => '#FFFFFF', 
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '.realestatepro-widget-body',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '.realestatepro-widget-body',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );



/* Fields for Footer Content -------------------------------------------------------------------------------------*/

    /* Add a field to change the footer background color */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'color',
		'settings'    => 'realestatepro_footer_color',
		'label'       => esc_attr__( 'Color del Pie de Página', 'realestatepro' ),
		'description' => esc_attr__( 'Selecciona el color para el fondo del área del Pie de Página del Sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_footer',
		'default'     => '#D9D4DB',
		'priority'    => 10,
		'output'      => array(
			array(
                'element'  => '#footer',
                'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
                'element'  => '#footer',
                'function' => 'css',
                'property' => 'background-color',
			),
		),
	) );


	/* Add a field to change the footer company information */
	Kirki::add_field( 'realestatepro_settings', array(
		'type'        => 'text',
		'settings'    => 'realestatepro_footer_company_info',
		'label'       => esc_attr__( 'Información de la Compañía en Pie de Página', 'realestatepro' ),
		'default'     => esc_attr__( '© Inmobigama, 2016. Todos los Derechos Reservados.', 'realestatepro' ),
		'description' => esc_attr__( 'Información de la Compañá que va al fondo del Sitio.', 'realestatepro' ),
		'section'     => 'realestatepro_footer',
		'priority'    => 10,
	) );

}


/* Global variables from Customizer used throughout the site */

function theme_settings_global_vars() {

    global $theme_settings;
    $theme_settings['currency'] = get_theme_mod( 'realestatepro_currency', esc_attr__( '$' ));
    $theme_settings['rental_period'] = get_theme_mod( 'realestatepro_rental_period', esc_attr__( ' pw' ));
    $theme_settings['buy_min_price'] = get_theme_mod( 'realestatepro_buy_min_price', 100000);
    $theme_settings['buy_max_price'] = get_theme_mod( 'realestatepro_buy_max_price', 2000000);
    $theme_settings['buy_increments'] = get_theme_mod( 'realestatepro_buy_increments', 25000);
    $theme_settings['rent_min'] = get_theme_mod( 'realestatepro_rent_min', 250);
    $theme_settings['rent_max'] = get_theme_mod( 'realestatepro_rent_max', 3500);
    $theme_settings['rent_increments'] = get_theme_mod( 'realestatepro_rent_increments', 250);

    
}
add_action( 'parse_query', 'theme_settings_global_vars' );


?>