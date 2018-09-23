<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Setup and manage custom post types (CPTs)
 */

class AM_CPTs
{

	public function __construct()
	{
        add_action('init', array($this, 'remove_post_type_supports'));
		add_action('init', array($this, 'add_post_type_supports'));
		add_theme_support('post-thumbnails');
		add_action('init', array($this, 'register_custom_post_types'), 0);

        // run after ACF saves its data (runs priority 10)
		add_action('acf/save_post', array($this, 'set_parent'), 20);
    }

    /**
	* Remove `editor` and discussion support from all post types (using ACF meta instead)
	*/
	public static function remove_post_type_supports()
	{
		$post_types = get_post_types();
		foreach ($post_types as $post_type)
		{
			remove_post_type_support($post_type, 'editor');
			remove_post_type_support($post_type, 'trackbacks');
			remove_post_type_support($post_type, 'comments');
		}
	}

	/**
	* Enables the Excerpt meta box in Page edit screen.
	*/
	public static function add_post_type_supports()
	{
		$post_types = array('page', 'post', 'am_photography_style');
		foreach ($post_types as $post_type)
		{
			add_post_type_support($post_type, 'excerpt');
		}
	}

	/**
	* Add Custom post type
	*/
	public function register_custom_post_types()
	{
		// Add Photography Style post type
		$photography_style_labels = array(
			 'name'                  => _x( 'Photography Styles', 'Photography Styles', 'text_domain' ),
			 'singular_name'         => _x( 'Photography Style', 'Photography Style', 'text_domain' ),
			 'menu_name'             => __( 'Photography Styles', 'text_domain' ),
			 'name_admin_bar'        => __( 'Photography Style', 'text_domain' ),
			 'archives'              => __( 'Photography Style Archives', 'text_domain' ),
			 'attributes'            => __( 'Photography Style Attributes', 'text_domain' ),
			 'parent_item_colon'     => __( 'Parent Photography Style:', 'text_domain' ),
			 'all_items'             => __( 'All Photography Styles', 'text_domain' ),
			 'add_new_item'          => __( 'Add New Photography Style', 'text_domain' ),
			 'add_new'               => __( 'Add New', 'text_domain' ),
			 'new_item'              => __( 'New Photography Style', 'text_domain' ),
			 'edit_item'             => __( 'Edit Photography Style', 'text_domain' ),
			 'update_item'           => __( 'Update Photography Style', 'text_domain' ),
			 'view_item'             => __( 'View Photography Style', 'text_domain' ),
			 'view_items'            => __( 'View Photography Styles', 'text_domain' ),
			 'search_items'          => __( 'Search Photography Styles', 'text_domain' ),
			 'not_found'             => __( 'Not found', 'text_domain' ),
			 'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			 'featured_image'        => __( 'Featured Image', 'text_domain' ),
			 'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			 'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			 'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			 'insert_into_item'      => __( 'Insert into Photography Style', 'text_domain' ),
			 'uploaded_to_this_item' => __( 'Uploaded to this Photography Style', 'text_domain' ),
			 'items_list'            => __( 'Photography Styles list', 'text_domain' ),
			 'items_list_navigation' => __( 'Photography Styles list navigation', 'text_domain' ),
			 'filter_items_list'     => __( 'Filter Photography Styles list', 'text_domain' ),
		);
		$args = array(
			 'label'                 => __( 'Photography Style', 'text_domain' ),
			 'description'           => '',
			 'labels'                => $photography_style_labels,
			 'taxonomies'            => array(),
			 'hierarchical'          => false,
			 'public'                => true,
			 'show_ui'               => true,
			 'show_in_menu'          => true,
			 'menu_position'         => 3,
			 'show_in_admin_bar'     => true,
			 'show_in_nav_menus'     => false,
			 'can_export'            => true,
			 'has_archive'           => false,
			 'exclude_from_search'   => false,
			 'publicly_queryable'    => true,
			 'capability_type'       => 'page',
			 'menu_icon'			 => 'dashicons-images-alt',
			 'supports'              => array('title', 'thumbnail', 'excerpt')
		);
        register_post_type(AM_Core::$PHOTOGRAPHY_STYLE_CPT, $args);

        // Add Photography Project post type
		$photography_project_labels = array(
            'name'                  => _x( 'Photography Projects', 'Photography Projects', 'text_domain' ),
            'singular_name'         => _x( 'Photography Project', 'Photography Project', 'text_domain' ),
            'menu_name'             => __( 'Photography Projects', 'text_domain' ),
            'name_admin_bar'        => __( 'Photography Project', 'text_domain' ),
            'archives'              => __( 'Photography Project Archives', 'text_domain' ),
            'attributes'            => __( 'Photography Project Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Photography Project:', 'text_domain' ),
            'all_items'             => __( 'All Photography Projects', 'text_domain' ),
            'add_new_item'          => __( 'Add New Photography Project', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Photography Project', 'text_domain' ),
            'edit_item'             => __( 'Edit Photography Project', 'text_domain' ),
            'update_item'           => __( 'Update Photography Project', 'text_domain' ),
            'view_item'             => __( 'View Photography Project', 'text_domain' ),
            'view_items'            => __( 'View Photography Projects', 'text_domain' ),
            'search_items'          => __( 'Search Photography Projects', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into Photography Project', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Photography Project', 'text_domain' ),
            'items_list'            => __( 'Photography Projects list', 'text_domain' ),
            'items_list_navigation' => __( 'Photography Projects list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter Photography Projects list', 'text_domain' ),
       );
       $args = array(
            'label'                 => __( 'Photography Project', 'text_domain' ),
            'description'           => '',
            'labels'                => $photography_project_labels,
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 4,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'menu_icon'			    => 'dashicons-portfolio',
            'supports'              => array('title', 'thumbnail', 'excerpt')
       );
       register_post_type(AM_Core::$PHOTOGRAPHY_PROJ_CPT, $args);
	}

	/**
	 * Set the parent pages of CPTs to allow easier parent lookup elsewhere. Intercept the save of posts and set the parent page
	 */

	public static function set_parent($post_id)
	{
		$post = get_post($post_id);
		$post_type = $post->post_type;

		if ($post_type === 'am_photography_style')
		{
			$parent = self::get_page_by_template('template-photography-styles.php');
			if ($parent) {
				self::update_post_parent($post_id, $parent->ID);
			}
        }
        /*if ($post_type === 'am_photography_proj')
		{
			$parent = get_post(159);
			if ($parent) {
				self::update_post_parent($post_id, $parent->ID);
			}
		}*/
	}

	private static function get_page_by_template($query) {
		$query = new WP_Query(array(
			'post_type'  => 'page',
			'post_status'=> 'publish',
			'meta_query' => array(
				array(
					'key'   => '_wp_page_template',
					'value' => $query
				)
			)
		));
		if (0 == $query->post_count)
			return false;

		return $query->posts[0];
	}

	private static function update_post_parent($post_id, $parent_id)
	{
		global $wpdb;
		$query = $wpdb->prepare("UPDATE $wpdb->posts SET post_parent = %d WHERE ID = %d", $parent_id, $post_id);
		$wpdb->query($query);
    }

}
new AM_CPTs();
?>