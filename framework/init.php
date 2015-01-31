<?php
define('PARENT_DIR', get_template_directory());
define('FRAMEWORK_FOLDER', 'framework');
define('PTS_THEME_NAME', 'Pixel Theme Studios');
define('THEME_LOGO', 'Pixel Theme Studios');
define('THEME_ADMIN_LINK_NAME', 'PTS Options');
define('THEME_ADMIN_NAME', 'PTS Options - By Pixel Theme Studios');
define('PTS_CODE_DIR', trailingslashit(PARENT_DIR).'framework');

define('PARENT_URL', get_template_directory_uri());
define('PTS_CODE_URL', trailingslashit(PARENT_URL).'framework');
define('PTS_CODE_IMAGES_URL', trailingslashit(PARENT_DIR).'css/images');
define('PTS_JS_URL', trailingslashit(PARENT_DIR).'js');
define('PTS_CSS_URL', trailingslashit(PARENT_DIR).'css');
define('CHILD_URL', get_stylesheet_directory_uri());
define( 'OPTIONS_FRAMEWORK_DIRECTORY', trailingslashit(PTS_CODE_URL) . 'option-tree/' );

//action after the theme is activated. In there you have the text domain.
add_action('after_setup_theme', 'pts_theme_setup');
function pts_theme_setup(){
	load_theme_textdomain( PTS_DOMAIN, get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}


/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
require_once( trailingslashit(PTS_CODE_DIR). 'font-awesome-array.php' );
require( trailingslashit( PTS_CODE_DIR ) . 'option-tree/ot-loader.php' );
require( trailingslashit( PTS_CODE_DIR ) . 'theme-options.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'required-functions.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'theme-functions.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'widget-areas.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'shortcodes.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'enqueues/css.php');
require_once( trailingslashit(PTS_CODE_DIR). 'enqueues/js.php');
require_once( trailingslashit(PTS_CODE_DIR). 'image_handler.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'widgets.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'vc.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'required-plugins.php' );
require_once( trailingslashit(PTS_CODE_DIR). 'class-tgm-plugin-activation.php' );
