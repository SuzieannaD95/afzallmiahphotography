<?php
if( !defined( 'ABSPATH' ) ) { exit; }
/**
 * Theme Name: AfzallMiah
 * Template Name: Photography Styles Template
 * @author Suzie Douglas
 *
 */

get_header();

    get_template_part('template-parts/template-based-partials/hero_image');

    get_template_part('template-parts/template-based-partials/photography_styles_slider');

    get_template_part('template-parts/get_flexible_content');

get_footer();

?>