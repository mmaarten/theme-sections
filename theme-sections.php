<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exits when accessed directly.
/*
Plugin Name:  Sections
Plugin URI:   
Description:  
Version:      0.1.0
Author:       Maarten Menten
Author URI:   https://profiles.wordpress.org/maartenm
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  theme-sections
Domain Path:  /languages
*/

define( 'THEME_SECTIONS_FILE', __FILE__ );


function theme_sections_load()
{
	$theme = wp_get_theme();

	if ( $theme && $theme->template == 'theme' ) 
	{
		require_once plugin_dir_path( THEME_SECTIONS_FILE ) . 'load.php';
	}

	else
	{
		add_action( 'admin_notices', 'theme_sections_dependency_notice' );
	}
}

add_action( 'plugins_loaded', 'theme_sections_load' );

function theme_sections_dependency_notice()
{
	$message = sprintf( esc_html__( '%s plugin needs %s theme.', 'theme-sections' ), 
		'<strong>Sections</strong>', '<strong>Theme</strong>' );

	printf( '<div class="notice notice-error"><p>%s</p></div>', $message ); 
}
