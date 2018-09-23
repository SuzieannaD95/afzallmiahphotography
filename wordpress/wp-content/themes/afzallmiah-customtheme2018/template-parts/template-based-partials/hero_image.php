<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    full-height-hero-image
    half-height-hero-image
    hero-image-text
    full-hero-image-text-bottom-right
    full-hero-image-text-top-left
    hero-image-text-top-left
*/

$hero_image = get_field('background_image');
$image_url = ($hero_image) ? $hero_image['url'] : false;
$hero_image_height = strtolower(get_field('height')); // Full-Height or Half-Height
if ($hero_image_height === 'full-height')
{
    $text_position = get_field('text_position_full_height'); // Top-Left (Default) or Bottom-Right
    $overlay_text_position = ($text_position === 'Bottom-Right') ? ('hero-image-text-bottom-right') : ('hero-image-text-top-left');
}
else
{
    $text_position = get_field('text_position_half_height'); // Left (Default) or Right
    $overlay_text_position = ($text_position === 'Right') ? ('hero-image-text-right') : ('hero-image-text-left');
}

$text_colour = get_field('text_colour'); // Colour Picker
$use_page_title_as_heading = get_field('use_page_title_as_heading'); // Yes (Default) or No
$heading = ($use_page_title_as_heading === 'No') ? get_field('alternative_heading') : get_the_title();
$supporting_text = get_field('supporting_text'); // Text Area
$white_space_under_hero_image = get_field('white_space_under_hero_image'); // Yes or No (Default)
$hero_image_white_space = ($white_space_under_hero_image === 'Yes') ? "margin-bottom: 60px;" : false;

echo "<div class='$hero_image_height-hero-image' style='background-image: url($image_url); $hero_image_white_space'>";
    echo "<div class='hero-image-text $overlay_text_position medium-text' style='color: $text_colour;'>";
        echo "<h1>$heading</h1>";
        echo "<p>$supporting_text</p>";
    echo "</div>";
echo "</div>";

?>