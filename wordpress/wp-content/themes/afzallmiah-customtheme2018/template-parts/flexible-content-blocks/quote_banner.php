<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    container
    quote-banner
    large-text
    slides
    quote
    author
*/

$text_colour = $field['text_colour']; // Colour Picker
$background_colour = $field['background_colour']; // Colour Picker

echo "<div class='container' style='background-color: $background_colour; color: $text_colour;'>";
  echo "<div class='quote-banner large-text'>";
    echo "<ul class='slides'>";
      $quotes = $field['quotes']; // Repeater
      if ($quotes)
      {
        foreach ($quotes as $quote)
        {
          $quote_line = $quote['quote']; // Text Area
          $author = $quote['author']; // Text
          echo "<li>";
            echo "<div class='quote'><p>$quote_line</p></div>";
            echo "<div class='author'>$author</div>";
          echo "</li>";
        }
      }
    echo "</ul>";
  echo "</div>";
echo "</div>";