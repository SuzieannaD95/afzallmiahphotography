<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    equal-height-rows-gallery-container
    equal-height-rows-gallery
    gallery-padding-small
    gallery-padding-medium
    gallery-padding-large
    equal-height-rows-gallery-row
    equal-height-rows-gallery-image
    mobile-hide
    desktop-hide
    responsive
*/

$display_as_the_background = $field['display_as_the_background']; // Yes or No (Default) -- Sets Position of Flex-Content-Block
    $container_height = ($display_as_the_background === 'Yes') ? "style='height: 750px;'" : false;
    $gallery_position = ($display_as_the_background === 'Yes') ? 'position: fixed;' : false;
    $gallery_container = ($display_as_the_background === 'Yes') ? "class='equal-height-rows-gallery-container'" : false;
    $gallery_div = ($display_as_the_background === 'Yes') ? 'equal-height-rows-gallery' : false;

$padding = strtolower($field['padding']); // None (Default) or Small or Medium or Large
    $padding_size = ($padding === 'none') ? false : "gallery-padding-$padding";

$chosen_background_colour = $field['background_colour']; // Colour Picker.
    $background_colour = ($padding != 'none') ? "background-color: $chosen_background_colour;" : false;

$row_of_images = $field['row_of_images']; // Repeater

echo "<div $gallery_container' $container_height>";
echo "<div class='$gallery_div $padding_size' style='$background_colour $gallery_position'>";
    foreach ($row_of_images as $row)
    {
        $gallery_images = $row['gallery_images']; // Array of Images

        // DESKTOP GALLERY
        echo "<div class='equal-height-rows-gallery-row mobile-hide'>";
            foreach ($gallery_images as $image)
            {
                $aspect_ratio = $image['width'] / $image['height']; // Calculate Aspect Ratio
                $image_src = $image['url'];
                $image_alt = $image['alt'];

                echo "<div class='equal-height-rows-gallery-image $padding_size' style='flex: $aspect_ratio;'>"; // Set Size to Auto Adjust
                    echo "<img class='responsive' src='$image_src' alt='$image_alt'/>";
                echo "</div>";
            }
        echo "</div>";

        // MOBILE GALLERY
        echo "<div class='equal-height-rows-gallery-row desktop-hide'>";
            foreach ($gallery_images as $index => $image)
            {
                $aspect_ratio = $image['width'] / $image['height']; // Calculate Aspect Ratio
                $image_src = $image['url'];
                $image_alt = $image['alt'];

                if (($index === 0) || ($index === 1) || ($index === 2) || ($index === 4) || ($index === 5))
                {
                    echo "<div class='equal-height-rows-gallery-image $padding_size' style='flex: $aspect_ratio;'>"; // Set Size to Auto Adjust
                        echo "<img class='responsive' src='$image_src' alt='$image_alt'/>";
                    echo "</div>";
                }
                if ($index === 3)
                {
                    echo "</div>";
                    echo "<div class='equal-height-rows-gallery-row desktop-hide'>"; // Start a new line on mobile after 3 images
                        echo "<div class='equal-height-rows-gallery-image' style='flex: $aspect_ratio;'>"; // Set Size to Auto Adjust
                            echo "<img class='responsive' src='$image_src' alt='$image_alt'/>";
                        echo "</div>";
                }
            }
        echo "</div>";
    }
echo "</div>";
echo "</div>";
?>