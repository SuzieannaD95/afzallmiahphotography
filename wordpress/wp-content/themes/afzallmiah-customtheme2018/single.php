<?php
if( !defined( 'ABSPATH' ) ) { exit; }
/**
 * The template for displaying all photography projects
 *
 * @package WordPress
 * @author Suzie Douglas
 */
 /**
 *
 */

get_header();

    get_template_part('template-parts/template-based-partials/hero_image');

    get_template_part('template-parts/template-based-partials/photography_project_info');

    get_template_part('template-parts/get_flexible_content');

get_footer();

?>