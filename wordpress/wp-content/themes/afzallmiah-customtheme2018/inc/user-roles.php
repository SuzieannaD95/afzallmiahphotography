<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Setup and manage user roles
 */

class AM_User_Roles
{

	public function __construct()
	{
        add_action('admin_init', array($this, 'change_role_name'));

        add_action('admin_init', array($this, 'remove_unused_user_roles'));

        register_activation_hook(__FILE__, array($this, 'create_user_roles'));
        add_action('admin_init', array($this, 'create_user_roles'));
    }

    function change_role_name()
    {
        global $wp_roles;

        $wp_roles->roles['administrator']['name'] = 'Developer';
        $wp_roles->role_names['administrator'] = 'Developer';
    }

    public function remove_unused_user_roles()
	{
        $roles_to_remove = array('subscriber', 'contributor', 'author', 'editor');

        foreach ($roles_to_remove as $role)
        {
            get_role($role);
            if ($role)
            {
                remove_role($role);
            }
        }
    }

    public function create_user_roles()
	{
        remove_role( 'website_admin' );
		add_role( 'website_admin', 'Website Admin', array(
            'activate_plugins' => true,
            'create_users' => true,
            'delete_plugins' => true,
            'delete_themes' => true,
            'delete_users' => true,
            'edit_files' => true,
            'edit_plugins' => false,
            'edit_theme_options' => true,
            'edit_themes' => false,
            'edit_users' => true,
            'export' => false,
            'import' => false,
            'install_plugins' => true,
            'install_themes' => true,
            'list_users' => true,
            'manage_options' => true,
            'promote_users' => true,
            'remove_users' => true,
            'switch_themes' => true,
            'update_core' => true,
            'update_plugins' => true,
            'update_themes' => true,
            'edit_dashboard' => true,
            'customize' => false,
            'delete_site' => true,
            'moderate_comments' => true,
            'manage_categories' => true,
            'manage_links' => true,
            'edit_others_posts' => true,
            'edit_pages' => true,
            'edit_others_pages' => true,
            'edit_published_pages' => true,
            'publish_pages' => true,
            'delete_pages' => true,
            'delete_others_pages' => true,
            'delete_published_pages' => true,
            'delete_others_posts' => true,
            'delete_private_posts' => true,
            'edit_private_posts' => true,
            'read_private_posts' => true,
            'delete_private_pages' => true,
            'edit_private_pages' => true,
            'read_private_pages' => true,
            'unfiltered_html' => true,
            'edit_published_posts' => true,
            'upload_files' => true,
            'publish_posts' => true,
            'delete_published_posts' => true,
            'edit_posts' => true,
            'delete_posts' => true,
            'read' => true,
        ));
    }

}

new AM_User_Roles();
?>