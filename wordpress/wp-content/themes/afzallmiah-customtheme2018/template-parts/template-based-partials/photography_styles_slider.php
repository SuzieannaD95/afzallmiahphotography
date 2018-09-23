<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
photography-styles-slider
js--blank-photography-style


*/
$background_colour = get_field('background_colour');
$photography_styles_to_show = get_field('photography_styles_to_show');

echo "<div class='photography-styles-slider' style='background: $background_colour;'>";
    echo "<ul class='slides'>";
    echo "<li class='js--blank-photography-style'></li>";
    if ($photography_styles_to_show)
    {
        foreach ($photography_styles_to_show as $photography_style_array)
        {
            $photography_style = $photography_style_array['photography_style'];
            $photography_style_name = get_the_title($photography_style);
            $photography_style_excerpt = get_the_excerpt($photography_style);
            echo "<li class='photography-styles-slide'>";
            echo get_the_post_thumbnail($photography_style->ID, 'photography_styles_slider_thumbnail', array(
                'class'=> 'responsive',
                'alt' => ''
                ));
                echo "<div class='image-bottom-caption'>";
                    echo "<h3>$photography_style_name</h3>";
                    echo "<p>$photography_style_excerpt</p>";
                echo "</div>";
            echo "</li>";
          }

    }
    echo "<li class='js--blank-photography-style'></li>";
    echo "</ul>";
echo "</div>";
?>