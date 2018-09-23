<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Setup and manage custom images sizes
 */

class AM_Image_Sizes
{
	public function __construct()
	{
        add_action('init', array($this, 'add_image_sizes'));
    }

    public function add_image_sizes()
    {
        add_image_size('photography_project_block_thumbnail', 600, 400, true);
        add_image_size('photography_styles_grid_thumbnail', 600, 400, true);

        add_image_size('photography_styles_slider_thumbnail', 400, 400, true);
        add_image_size('hex_grid_thumbnail', 355, 410, true);
    }

}

/** HOW TO USE:
 *
 *  Either:
 *  echo get_the_post_thumbnail($post_ID, 'custom-image-size', array(
 *                  'class'=> 'responsive',
 *                  'alt' => ''
 *                  ));

 *  Or:
 *  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), $size='custom-image-size');
 *  $image_url = $image[0];
 *  echo "<img class='responsive' src='$image_url' alt='' />";
 *
 */

new AM_Image_Sizes();
?>
