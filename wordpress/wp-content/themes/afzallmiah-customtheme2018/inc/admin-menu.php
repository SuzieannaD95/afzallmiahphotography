<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Setup and manage the admin menu
 */

class AM_Admin_Menu
{
    public function __construct()
	{
        // filter the main left hand admin bar on admin dashboard etc
        add_action( 'admin_menu', array( $this, 'filter_admin_menu' ), 9999 );
        // filter admin bar on admin dashboard etc
        add_action( 'admin_init', array( $this, 'filter_admin_bar' ) );
        // filter admin bar on each page
        add_action( 'template_redirect', array( $this, 'filter_admin_bar' ) );
        // remove unneeded features on the admin bar
        add_action( 'admin_bar_menu', array( $this, 'remove_admin_bar_menu_items' ), 100 );
        // Add page in admin panel
        add_action('init', array($this, 'add_acf_options_page'));
    }

    public $website_admin_blocked_pages = array(
        'options-writing.php',
        'options-reading.php',
        'tools.php',
        'edit.php?post_type=acf-field-group'
    );

    public function filter_admin_menu()
	{
		remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php' );
        global $submenu;
        // Appearance Menu
        unset($submenu['themes.php'][6]); // Customize

		if (current_user_can('website_admin'))
		{
			foreach ($this->website_admin_blocked_pages as $blocked_page) {
				remove_menu_page( $blocked_page );
                remove_submenu_page( 'options-general.php', $blocked_page );
			}
        }
    }

    /**
     * Editing the Admin bar above website pages when logged in
     */

    public function filter_admin_bar()
	{
		remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_customize_menu', 40 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_updates_menu', 50 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }

    public function remove_admin_bar_menu_items()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_node( 'about' );
		$wp_admin_bar->remove_node( 'wporg' );
		$wp_admin_bar->remove_node( 'documentation' );
		$wp_admin_bar->remove_node( 'support-forums' );
        $wp_admin_bar->remove_node( 'feedback' );
        $wp_admin_bar->remove_node( 'themes' );
		$wp_admin_bar->remove_node( 'new-post' );
        $wp_admin_bar->remove_node( 'new-media' );
        $wp_admin_bar->remove_node( 'new-user' );
    }

    // Add page in admin panel
	public function add_acf_options_page()
	{
		if( function_exists('acf_add_options_page') )
		{
			$option_page = acf_add_options_page(array(
				'page_title' 	=> 'Website Settings',
				'menu_title' 	=> 'Website Settings',
				'menu_slug' 	=> 'website-settings',
				'position' 	=> 2,
			));
		}
	}

}
new AM_Admin_Menu();
?>