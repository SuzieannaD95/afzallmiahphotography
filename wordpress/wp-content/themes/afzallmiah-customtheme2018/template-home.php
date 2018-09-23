<?php
if( !defined( 'ABSPATH' ) ) { exit; }
/**
 * Theme Name: AfzallMiah
 * Template Name: Homepage
 * @author Suzie Douglas
 * 
 */

get_header();

    get_template_part('template-parts/template-based-partials/full_screen_image_carousel');

    get_template_part('template-parts/get_flexible_content');

    get_template_part('template-parts/contact_form_block');

get_footer();

?>