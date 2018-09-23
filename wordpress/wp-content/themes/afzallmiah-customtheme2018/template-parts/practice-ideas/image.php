<?php
if( !defined( 'ABSPATH' ) ) { exit; }

$use_featured_image = $field['use_featured_image'];
$image = $field['image'];
$image_link = $image['url'];

if ($use_featured_image === 'Yes')
{
    if (has_post_thumbnail($post->ID))
    {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $image_link = $image[0];
    } 
}

echo "<div class='medium-container'>";
echo "<div class='flexible-block'>";
    echo "<img class='responsive' src='$image_link'/>";	
echo "</div>";
echo "</div>";
?>