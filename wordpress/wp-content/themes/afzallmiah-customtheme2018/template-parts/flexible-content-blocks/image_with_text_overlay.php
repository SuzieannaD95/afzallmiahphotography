<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    image-with-text-overlay-container
    image-with-text-overlay-tb-top-right
    image-with-text-overlay-tb-bottom-left
    width-40pc
    padding-medium
    small-text
    image-with-text-overlay-button
*/

$background_image = $field['background_image']; // Image
$background_image_url = ($background_image) ? $background_image['url'] : false;
$chosen_text_block_position = strtolower($field['text_block_position']); // Bottom-Left (Default) or Top-Right
$text_block_position = ($chosen_text_block_position === 'top-right') ? 'image-with-text-overlay-tb-top-right' : 'image-with-text-overlay-tb-bottom-left';
$text_block_background_colour = $field['text_block_background_colour']; // Colour Picker

$text_block = $field['text_block']; // Group
$text_colour = $text_block['text_colour']; // Text
$text_block_header = $text_block['text_block_header']; // Text
$text_block_content = $text_block['text_block_content']; // Text Area
$button_text = $text_block['button_text']; // Text
$button_link = $text_block['button_link']; // Page Link

echo "<div class='image-with-text-overlay-container' style='background-image: url($background_image_url);'>";
    echo "<div class='$text_block_position width-40pc'>";
        echo "<div class='padding-medium small-text' style='background: $text_block_background_colour; color: $text_colour;'>";
            echo "<h2 class='container-header'>$text_block_header</h2>";
            echo "<p>$text_block_content</p>";
            echo "<a class='image-with-text-overlay-button' href='$button_link'>$button_text</a>";
        echo "</div>";
    echo "</div>";
echo "</div>";
?>