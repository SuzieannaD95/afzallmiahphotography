<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    container
    wide-text-width
    narrow-text-width
    total-center
    container-header
    medium-text
*/

$width = strtolower($field['width']); // Wide (Default) or Narrow
$background_colour = $field['background_colour']; // Colour Picker
$heading = $field['heading']; // Text
$text_colour = get_field('text_colour'); // Colour Picker
$text = $field['text']; // WYSIWYG

echo "<div class='container' style='background-color: $background_colour; color: $text_colour;'>";
  echo "<div class='$width-text-width total-center'>";
    echo "<h2 class='container-header'>$heading</h2>";
    echo "<div class='medium-text'>$text</div>";
  echo "</div>";
echo "</div>";