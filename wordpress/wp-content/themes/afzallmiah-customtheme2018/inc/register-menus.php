<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Setup and manage custom menus throughout the site
 */

class AM_Menus
{
    public function __construct()
	{
        add_action('init', array($this, 'register_menu_locations'));
    }
    public function register_menu_locations()
	{
		add_theme_support( 'menus' );
		register_nav_menu( AM_Core::$MENU_MAIN_NAV, "Main Header Navigation" );
		register_nav_menu( AM_Core::$MENU_FOOTER_NAV, "Footer Navigation" );
    }

}

new AM_Menus();
?>