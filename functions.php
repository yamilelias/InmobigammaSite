<?php


/*
     ==========================================
		Include Scripts
     ==========================================
*/
function realestatepro_core_script_enqueue() {
	
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.6', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/realestatepro.css', array(), '1.0.0', 'all');
	wp_enqueue_style('nivoslider-default', get_template_directory_uri() . '/css/nivo-default.css', array(), '', 'all');
	wp_enqueue_style('nivoslider', get_template_directory_uri() . '/css/nivo-slider.css', array(), '', 'all');

	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/realestatepro.js', array(), '1.0.0', false);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.6', true);
	wp_enqueue_script('nivoslider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array(), '3.2.0', false );

}

add_action('wp_enqueue_scripts', 'realestatepro_core_script_enqueue');


/*
     ==========================================
		Include Page Specific Scripts
     ==========================================
*/
function realestatepro_features_script_enqueue() {

	//css
	wp_enqueue_style('lightslider', get_template_directory_uri() . '/css/lightslider.css', array(), '', 'all');


	//js
	wp_register_script( 'lightslider', get_template_directory_uri() . '/js/jquery.lightslider.js', array('jquery'), '', false );
	wp_register_script( 'googlemap', get_template_directory_uri() . '/js/jquery.google-map.js', array('jquery'), '', false );
	wp_register_script( 'googlemapapi','https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('jquery'), '', false );

	if( is_page_template('contact.php') || is_singular( 'properties' ) ) {
		wp_enqueue_style('lightslider');
		wp_enqueue_script( 'lightslider');				
		wp_enqueue_script( 'googlemap');
		wp_enqueue_script( 'googlemapapi');
	}

}

add_action( 'wp_enqueue_scripts', 'realestatepro_features_script_enqueue' );


/*
     ==========================================
		Include Custom Fields Setup File
     ==========================================
*/

require_once 'inc/custom-fields.php';

/*
     ==========================================
		Include Walker file
     ==========================================
*/
require get_template_directory() . '/inc/walker.php';


/*
     ==========================================
		Include Customizer Options
     ==========================================
*/
require get_template_directory() . '/inc/customizer-options.php';


/*
     ==========================================
		Include Sortable Editor Columns
     ==========================================
*/
require get_template_directory() . '/inc/editor-sortable-columns.php';


/*
     ==========================================
		Include Custom Post Types
     ==========================================
*/
require get_template_directory() . '/inc/custom-post-types.php';


/*
     ==========================================
		Include Property Search Form Widget
     ==========================================
*/
require get_template_directory() . '/widgets/widget-property-search.php';


/*
     ==========================================
		Include Mortgage Calculator Widget
     ==========================================
*/
require get_template_directory() . '/widgets/widget-mortgage-calculator.php';


/*
     ==========================================
		Remove WordPress version for security
     ==========================================
*/
function realestatepro_remove_version() {
	return '';
}
add_filter('the_generator', 'realestatepro_remove_version');


/*
     ==========================================
		Activate Menus
     ==========================================
*/
function realestatepro_theme_setup () {

	add_theme_support('menus');

	register_nav_menu ('primary', 'Primary Header Navigation');
	register_nav_menu ('secondary', 'Primary Footer Navigation');

}

add_action('init', 'realestatepro_theme_setup');


/*
     ==========================================
		Activate Theme Support Functionality
     ==========================================
*/
add_theme_support('post-thumbnails');
add_theme_support('html5',array('search-form'));
	

/*
     ==========================================
		Activate Sidebar Functionality
     ==========================================
*/
Function realestatepro_widget_setup() {
	
	register_sidebar(
		array(
			'name' 	=> 'Sidebar',
			'id' 	=> 'sidebar-1',
			'class' => 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
		);	
}
add_action('widgets_init','realestatepro_widget_setup');


/*
     ==========================================
		Add pagination to search results
     ==========================================
*/ 

/**
 * @param string $pages - $query->max_num_page need
 * @param int $range
 */
function realestatepro_pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		echo "<ul class='paginate-links'>";
//        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		if($paged != 1) echo "<li><a href='".get_pagenum_link($paged-1)."'>Previous</a></li>";
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class='active' ><a href='".$i."' >".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
			}
		}
		if($paged != $pages) echo "<li><a href='".get_pagenum_link($paged+1)."'>Next</a></li>";
//        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		echo "</ul>\n";
	}
}


/*
     ==========================================
		Help install required plugins
     ==========================================
*/ 

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Advanced Custom Fields', // The plugin name.
			'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/advanced-custom-fields.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'               => 'Site Origins Page Builder', 
			'slug'               => 'siteorigin-panels', 
			'source'             => get_template_directory() . '/plugins/so-page-builder.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => true,
			'force_deactivation' => true,
			'external_url'       => '',
			'is_callable'        => '',
		),

		array(
			'name'               => 'Site Origins Widget Bundle', 
			'slug'               => 'widget-bundle', 
			'source'             => get_template_directory() . '/plugins/so-widgets-bundle.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => true,
			'force_deactivation' => true,
			'external_url'       => '',
			'is_callable'        => '',
		),


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		*/
	);

	tgmpa( $plugins, $config );
}


