<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    flexslider
    full-screen-image-carousel
    full-screen-image-carousel-overlay-div
    social-media-icons-fixed-bottom-left
    social-media-icons-fixed-bottom-right
    indv-social-media-icon-fixed-bottom
*/

$carousel_settings = get_field('carousel_settings');
$slider_speed = $carousel_settings['slider_speed']; // Slow or Medium (Default) or Fast --- Used in jQuery
$slider_effect = $carousel_settings['slide_effect']; // Slide (Default) or Fade --- Used in jQuery
$background_images = get_field('background_images'); // Gallery
$text_overlay = get_field('text_overlay'); // Group
$text_colour = $text_overlay['text_colour']; // Colour Picker
$use_page_title_as_heading = $text_overlay['use_page_title_as_heading']; // Yes (Default) or No
$heading = ($use_page_title_as_heading === 'No') ? $text_overlay['alternative_heading'] : get_the_title();
$supporting_text = $text_overlay['supporting_text']; // Text Area


echo "<div class='flexslider full-screen-image-carousel $slider_speed $slider_effect'>";
  echo "<ul class='slides'>";
  if ($background_images)
  {
    foreach ($background_images as $image)
    {
      $image_src = $image['url'];

      echo "<li><img src='$image_src'/></li>";
    }
  }
  echo "</ul>";
echo "</div>";

echo "<div class='full-screen-image-carousel-content medium-text width-40pc' style='color: $text_colour;'>";
  echo "<h1>$heading</h1>";
  echo "<p>$supporting_text</p>";
echo "</div>";

echo "<div class='full-screen-image-carousel-overlay-div'>";

$social_media_icons = get_field('social_media_icons');
$show_social_media_icons = $social_media_icons['show_social_media_icons'];
if ($show_social_media_icons === 'Yes')
{
  $social_media_class = 'social-media-icons-fixed-bottom-left';
  $position = $social_media_icons['position'];
  if ($position === 'Right')
  {
    $social_media_class = 'social-media-icons-fixed-bottom-right';
  }
  $icons_to_show = $social_media_icons['icons_to_show'];
  $show_facebook = $icons_to_show['facebook'];
  $show_twitter = $icons_to_show['twitter'];
  $show_instagram = $icons_to_show['instagram'];
  $show_linkedin = $icons_to_show['linked_in'];

  $facebook = get_field('facebook', 'option');
    $facebook_custom_options = $facebook['custom_options'];
      $facebook_link = $facebook_custom_options['facebook_link'];
      $facebook_colour = $facebook_custom_options['facebook_colour'];
    $facebook_icons = $facebook['facebook_icons'];
      $facebook_icon_white = $facebook_icons['facebook_icon_white'];
      $facebook_icon_white_URL = $facebook_icon_white['url'];

  $twitter = get_field('twitter', 'option');
    $twitter_custom_options = $twitter['custom_options'];
      $twitter_link = $twitter_custom_options['twitter_link'];
      $twitter_colour = $twitter_custom_options['twitter_colour'];
    $twitter_icons = $twitter['twitter_icons'];
      $twitter_icon_white = $twitter_icons['twitter_icon_white'];
      $twitter_icon_white_URL = $twitter_icon_white['url'];

  $instagram = get_field('instagram', 'option');
    $instagram_custom_options = $instagram['custom_options'];
      $instagram_link = $instagram_custom_options['instagram_link'];
      $instagram_colour = $instagram_custom_options['instagram_colour'];
    $instagram_icons = $instagram['instagram_icons'];
      $instagram_icon_white = $instagram_icons['instagram_icon_white'];
      $instagram_icon_white_URL = $instagram_icon_white['url'];

  $linkedin = get_field('linkedin', 'option');
    $linkedin_custom_options = $linkedin['custom_options'];
      $linkedin_link = $linkedin_custom_options['linkedin_link'];
      $linkedin_colour = $linkedin_custom_options['linkedin_colour'];
    $linkedin_icons = $linkedin['linkedin_icons'];
      $linkedin_icon_white = $linkedin_icons['linkedin_icon_white'];
      $linkedin_icon_white_URL = $linkedin_icon_white['url'];
}

if ($show_social_media_icons === 'Yes')
{
  echo "<div class='$social_media_class'>";
    if (($show_facebook == 1) && ($facebook_link))
    {
      echo "<a href='$facebook_link'><img class='indv-social-media-icon-fixed-bottom' src='$facebook_icon_white_URL'/></a>";
    }
    if (($show_twitter == 1) && ($twitter_link))
    {
      echo "<a href='$twitter_link'><img class='indv-social-media-icon-fixed-bottom' src='$twitter_icon_white_URL'/></a>";
    }
    if (($show_instagram == 1) && ($instagram_link))
    {
      echo "<a href='$instagram_link'><img class='indv-social-media-icon-fixed-bottom' src='$instagram_icon_white_URL'/></a>";
    }
    if (($show_linkedin == 1) && ($linkedin_link))
    {
      echo "<a href='$linkedin_link'><img class='indv-social-media-icon-fixed-bottom' src='$linkedin_icon_white_URL'/></a>";
    }
  echo "</div>";
}

echo "</div>";

?>