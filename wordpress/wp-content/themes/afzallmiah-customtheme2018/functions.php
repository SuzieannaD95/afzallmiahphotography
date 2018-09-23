<?php
if( !defined( 'ABSPATH' ) ) { exit; }

define('AM_PATH', plugin_dir_path(__FILE__));
define('AM_URL', plugin_dir_url(__FILE__));

class AM_Core
{
	public static $MENU_MAIN_NAV = "Main Nav";
	public static $MENU_FOOTER_NAV = "Footer Nav";

	public static $PHOTOGRAPHY_STYLE_CPT = "am_photography_style";
	public static $PHOTOGRAPHY_PROJ_CPT = "am_photography_proj";

	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this, 'afzallmiah_scripts_styles') );
		// EXAMPLE: add_action('init', array($this, 'remove_post_type_supports'))


		$this->include_files();
	}

	public function include_files()
	{
		include_once AM_PATH . '/inc/user-roles.php';
		include_once AM_PATH . '/inc/admin-menu.php';
		include_once AM_PATH . '/inc/CPTs.php';
		include_once AM_PATH . '/inc/custom-image-sizes.php';
		include_once AM_PATH . '/inc/register-menus.php';
	}

	function afzallmiah_scripts_styles()
	{
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'flex-script', get_template_directory_uri() . '/assets/js/third-party/jquery.flexslider-min.js', array(), '1.0', true );
		wp_enqueue_script( 'am-sliders', get_template_directory_uri() . '/assets/js/custom/am-sliders.js', array (), '1.0', true );
		wp_enqueue_script( 'myscript', get_template_directory_uri() . '/assets/js/custom/afzallmiah.js', array (), '1.0', true );
		wp_enqueue_style( 'styles', get_stylesheet_uri());
	}

	//Check if current page is active
	public static function get_topmost_parent($post_id, $limit_parent = 0)
	{
		$current_post = get_post($post_id);
		if ($current_post == null)
			return null;

		$parent_id = self::get_parent_id($current_post);
		if($parent_id == 0 || $parent_id == $limit_parent)
		{
			return $post_id;
		}
		else
		{
			return self::get_topmost_parent($parent_id, $limit_parent);
		}
	}

	public static function get_parent_id($post_id)
	{
		$post = get_post($post_id);
		return $post->post_parent;
	}

	public static function is_page_active($page)
	{
		$page_id = isset($page->object_id) ? $page->object_id : $page->ID;
		$current_id = get_the_ID();
		$current_topmost_parent_id = self::get_topmost_parent($current_id);

		if ($current_topmost_parent_id == $page_id) {
			return true;
		}
		return false;
	}

}

new AM_Core();
?>