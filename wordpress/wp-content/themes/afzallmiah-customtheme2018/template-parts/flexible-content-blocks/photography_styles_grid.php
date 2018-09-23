<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
	container
	cf
	container-header
	flex-container
	flex-item
	third-width
	js--image-container-caption-overlay
	responsive
	image-caption
*/

$title = $field['title']; // Text
$text_colour = $field['text_colour']; // Text
$background_colour = $field['background_colour']; // Colour Picker
$styles_to_show = $field['styles_to_show']; // Repeater of photography_style, of type Post Object
$page_to_link_styles_to = $field['page_to_link_styles_to']; // Page link

echo "<div class='container cf' style='background: $background_colour; color: $text_colour;'>";
  echo "<h2 class='container-header'>$title</h2>";
  echo "<div class='flex-container'>";
		if ($styles_to_show)
		{
		  foreach ($styles_to_show as $style_chosen)
		  {
			$photography_style = $style_chosen['photography_style'];
			$photography_style_name = get_the_title($photography_style);
			echo "<div class='flex-item third-width js--image-container-caption-overlay'>";
			echo "<a href='$page_to_link_styles_to'>";
			echo get_the_post_thumbnail($photography_style->ID, 'photography_styles_grid_thumbnail', array(
			  'class'=> 'responsive',
			  'alt' => ''
			  ));
			  echo "<div class='image-caption'>";
			  echo $photography_style_name;
			  echo "</div>";
			echo "</a>";
			echo "</div>";
		  }
		}
  echo "</div>";
echo "</div>";