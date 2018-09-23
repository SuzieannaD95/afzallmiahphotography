<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content




*/
$background_colour = get_field('background_colour');

$post_type = AM_Core::$PHOTOGRAPHY_STYLE_CPT;

$args = array(
    'post_type' => $post_type,
    'post_status' => 'publish',
);

$photography_styles_query = new WP_Query($args);

$all_photography_styles = $photography_styles_query->posts;

echo "<div class='photography-styles-slider' style='background: $background_colour;'>";
    echo "<ul class='slides'>";
    if ($all_photography_styles)
    {
        foreach ($all_photography_styles as $photography_style)
        {
            $photography_style_name = get_the_title($photography_style);
            $photography_style_image = wp_get_attachment_url(get_post_thumbnail_id($photography_style->ID));
            $photography_style_excerpt = get_the_excerpt($photography_style);
            echo "<li>";
                echo "<div class='flex-item third-width'>";
                    echo "<img class='responsive' src='$photography_style_image'/>";
                    echo "<div class='image-bottom-caption'>";
                        echo $photography_style_name;
                        echo $photography_style_excerpt;
                    echo "</div>";
                echo "</div>";
            echo "</li>";
          }

    }
    echo "</ul>";
echo "</div>";
?>