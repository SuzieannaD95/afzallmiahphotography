<?php
if( !defined( 'ABSPATH' ) ) { exit; }

$title = get_field('title'); // Text
$text_colour = get_field('text_colour'); // Colour Picker
$background_colour = get_field('background_colour'); // Colour Picker
$tagline = get_field('tagline'); // Text Area

echo "<div class='container' style='background: $background_colour; color: $text_colour;'>";

    echo "<h2>$title</h2>";
    echo "<p>$tagline</p>";

    $args = array(
        'id' => 'form_5ba7dc0b83fcf',
        'submit_text' => 'Submit'
    );

    $form = advanced_form('form_5ba7dc0b83fcf', $args);

echo "</div>";

?>