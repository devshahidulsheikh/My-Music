<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'zboom_opt';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'zBoom Options', 'zboom' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'zBoom Options', 'zboom' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => get_template_directory_uri() .'/images/favicon.ico',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => 'Enjoyed My Options? Please leave us a <a href="www.fiverr.com/shahiduldesigne">★★★★★<a/> rating. We really appreciate your support!',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => __( 'Documentation', 'zboom' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __( 'Support', 'zboom' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => __( 'Extensions', 'zboom' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/devshahidul',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/devshahidul',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/devshahidul',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/devshahidul',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	/* $args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'zboom' ), '<strong>' . $v . '</strong>' ) . '<p>'; */
}/*  else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'zboom' ) . '</p>';
} */

// Add content after the form.
/* $args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'zboom' ) . '</p>'; */

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'zboom' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'zboom' ) . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'zboom' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'zboom' ) . '</p>',
	),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'zboom' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

Redux::set_section($opt_name,array(
		'id' => 'gen-sec',
		'title' => esc_html__( 'General Options', 'zboom' ),
		'desc' => esc_html__( 'Change your website background', 'zboom' ),
		'customizer_width' => '400px',
		'icon' => 'el el-tasks',
		/* 'fields' => array(
			array(
				'id' => 'body-bg',
				'type' => 'background',
				'title' => esc_html__( 'Body Background', 'zboom' ),
				'subtitle' => esc_html__( 'Chang or Upload your background here', 'zboom' ),
				'desc' => esc_html__( 'Upload your background image', 'zboom' ),
				// 'compiler' => true,
				'default' => array(
					'background-color' => '#1e73be',
					'background-image' => esc_url( get_template_directory_uri() .'/images/logo.png' )
				)
			),
			array(
				'id' => 'divider-1',
				'type' => 'divide'
			),
			array(
				'id'       => 'opt_dimensions',
				'type'     => 'dimensions',
				'units'    => array('em','px','%'),
				'title'    => esc_html__('Dimensions (Width/Height) Option', 'zboom'),
				'subtitle' => esc_html__('Allow your users to choose width, height, and/or unit.', 'zboom'),
				'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'zboom'),
				'default'  => array(
					'Width'   => '200', 
					'Height'  => '100'
			),
			)
		) */

		Redux::set_field( $opt_name, 'gen-sec', array(         
			'id'       => 'body-bg',
			'type'     => 'background',
			'title'    => esc_html__('Body Background', 'zboom'),
			'subtitle' => esc_html__('Chang or Upload your background here', 'zboom'),
			'desc'     => esc_html__('Upload your background image, again good for additional info.', 'zboom'),
			'default'  => array(
				'background-color' => '#afb58a',
				'background-image' => esc_url( get_template_directory_uri() .'/images/logo.png' )
			)
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'   =>'divider-1',
			// 'desc' => esc_html__('This is the description field.', 'zboom'),
			'type' => 'divide'
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'header-dimensions',
			'type'     => 'dimensions',
			'units'    => array('em','px','%'),
			'title'    => esc_html__('Dimensions (Width/Height) Option', 'zboom'),
			'subtitle' => esc_html__('Allow your users to choose width, height, and/or unit.', 'zboom'),
			'desc'     => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.', 'zboom'),
			'default'  => array(
				'Width'   => '200', 
				'Height'  => '100'
			),
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'site-layout',
			'type'     => 'image_select',
			'title'    => esc_html__('Main Layout', 'zboom'), 
			'subtitle' => esc_html__('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'zboom'),
			'options'  => array(
				'1'      => array(
					'alt'   => '1 Column', 
					'img'   => ReduxFramework::$_url.'assets/img/1col.png'
				),
				'2'      => array(
					'alt'   => '2 Column Left', 
					'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
				),
				'3'      => array(
					'alt'   => '2 Column Right', 
					'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
				),
				'4'      => array(
					'alt'   => '3 Column Middle', 
					'img'   => ReduxFramework::$_url.'assets/img/3cm.png'
				),
				'5'      => array(
					'alt'   => '3 Column Left', 
					'img'   => ReduxFramework::$_url.'assets/img/3cl.png'
				),
				'6'      => array(
					'alt'  => '3 Column Right', 
					'img'  => ReduxFramework::$_url.'assets/img/3cr.png'
				)
			),
			'default' => '3'
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'tag-select',
			'type'     => 'select',
			'title'    => esc_html__('Tag Option', 'zboom'), 
			'subtitle' => esc_html__('No validation can be done on this field type', 'zboom'),
			'desc'     => esc_html__('This is the description field, again good for additional info.', 'zboom'),
			'data'     => 'tag',
			// Must provide key => value pairs for select options
			/* 'options'  => array(
				'1' => 'Opt 1',
				'2' => 'Opt 2',
				'3' => 'Opt 3'
			),
			'default'  => '2', */
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'left-side-cat',
			'type'     => 'select',
			'title'    => esc_html__('Left side category Option', 'zboom'), 
			'subtitle' => esc_html__('No validation can be done on this field type', 'zboom'),
			'desc'     => esc_html__('This is the description field, again good for additional info.', 'zboom'),
			'data'     => 'category',
			'default'  => '1'
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'right-side-cat',
			'type'     => 'select',
			'title'    => esc_html__('Right side category Option', 'zboom'), 
			'subtitle' => esc_html__('No validation can be done on this field type', 'zboom'),
			'desc'     => esc_html__('This is the description field, again good for additional info.', 'zboom'),
			'data'     => 'category',
			'default'  => '1'
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'       => 'post-select',
			'type'     => 'select',
			'title'    => esc_html__('Post Option', 'zboom'), 
			'subtitle' => esc_html__('No validation can be done on this field type', 'zboom'),
			'desc'     => esc_html__('This is the description field, again good for additional info.', 'zboom'),
			'data'     => 'post_type',
		) ),
		Redux::set_field( $opt_name, 'gen-sec', array(
			'id'        => 'opt-slider-label',
			'type'      => 'slider',
			'title'     => esc_html__('Slider Example 1', 'your-textdomain-here'),
			'subtitle'  => esc_html__('This slider displays the value as a label.', 'your-textdomain-here'),
			'desc'      => esc_html__('Slider description. Min: 1, max: 500, step: 1, default value: 250', 'your-textdomain-here'),
			"default"   => 250,
			"min"       => 1,
			"step"      => 1,
			"max"       => 500,
			'display_value' => 'label'
		) )				
		
	)
);

Redux::set_section($opt_name,array(
		'id' => 'header-sec',
		'title' => esc_html__( 'Header Options', 'zboom' ),
		'desc' => esc_html__( 'These are really basic fields!', 'zboom' ),
		'customizer_width' => '400px',
		'icon' => 'el el-home',
		'fields' => array(
			array(
				'id' => 'logo-upload',
				'type' => 'media',
				'title' => esc_html__( 'Logo Uploader', 'zboom' ),
				'subtitle' => esc_html__( 'Upload your logo here', 'zboom' ),
				'desc' => esc_html__( 'Upload your logo', 'zboom' ),
				// 'compiler' => true,
				'default' => array(
					'url' => esc_url( get_template_directory_uri() .'/images/logo.png' )
				)
			)
		)
	)
);

Redux::set_section( $opt_name, array(
	'id' => 'social-sec',
	'title' => 'Social Options',
	'icon' => 'fa-solid fa-users',
	'heading' => 'Expanded New Section Title',
	'desc' => '<br />This is the section description.  HTML is permitted.<br />',
	Redux::set_field( $opt_name, 'social-sec', array(
		'id'=> 'social-icon',
		'type' => 'text',
		'options' => array(
			'1' => 'Facebook',
			'2' => 'Instagram',
			'3' => 'Twitter',
			'4' => 'Linked In',
			'5' => 'YouTube',
		)
		),
	)
	
) );

Redux::set_section($opt_name,array(
	'title' => esc_html__( 'Styling Options','zboom' ),
	'icon' => 'fa-solid fa-palette',
	'desc' => esc_html__( 'You may change or update the styling options','zboom' ),
	'fields' => array(
		array(
			'title' => esc_html__( 'Custom CSS','zboom' ),
			'subtitle' => esc_html__( 'Add your own codes','zboom' ),
			'desc' => esc_html__( 'You may add some css code if you don\'t want to edit your style.css','zboom' ),
			'type' => 'ace_editor',
			'id' => 'custom-css',
			'mode' => 'css'
		),
		array(
			'title' => esc_html__( 'Default Color','zboom' ),
			'desc' => esc_html__( 'Add a default color of your website','zboom' ),
			'type' => 'color',
			'id' => 'default-color',
			'default' => "#aaa",
		),
		array(
			'title' => esc_html__( 'Link Color','zboom' ),
			'desc' => esc_html__( 'Add a default link color of your website','zboom' ),
			'type' => 'color',
			'id' => 'link-color',
			'default' => "#0fff00",
		)
	)
));

Redux::set_Section($opt_name,array(
	'title' => esc_html__( 'Footer Options','zboom' ),
	'icon' => 'fa-solid fa-tent-arrow-down-to-line',
	'fields' => array(
		array(
			'title' => esc_html__( 'Copyright Text','zboom' ),
			'type' => 'editor',
			'id' => 'copyright-text',
			'default' => 'Copyright &copy; All Rights Reserved'
		)
	)
)
);



/**
 * Metaboxes
 */
require_once Redux_Core::$dir . '../sample/metaboxes.php';

/**
 * Raw README
 */
if ( file_exists( $dir . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'zboom' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
}

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'zboom' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'zboom' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'zboom' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'zboom' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'zboom' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'zboom' ),
					'2' => esc_html__( 'Opt 2', 'zboom' ),
					'3' => esc_html__( 'Opt 3', 'zboom' ),
				),
				'default'         => '2',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'zboom' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'zboom' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'zboom' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
