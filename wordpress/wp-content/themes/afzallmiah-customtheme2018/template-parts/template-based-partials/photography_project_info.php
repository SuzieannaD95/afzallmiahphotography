<?php
if( !defined( 'ABSPATH' ) ) { exit; }


$project_information = get_field('project_information'); // Group
$project_information_title = $project_information['project_information_title']; // Text
$about_the_project = $project_information['about_the_project']; // WYSIWYG
$project_images = $project_information['project_images']; // Gallery (Array of Images)
$project_gallery_style = $project_information['project_gallery_style']; // Rows (Horizontal) (Default) or Columns (Vertical)
if ($project_gallery_style === 'Rows (Horizontal)')
{
    $gallery_style = 'hex-grid-rows';
}
else
{
    $gallery_column_count = $project_information['gallery_column_count'];
    $gallery_style = ($gallery_column_count === '3') ? 'hex-grid-columns-3': 'hex-grid-columns-4';
}

echo "<div class='photography-project-info'>";
    echo "<div class='photography-project-info-text'>";
        echo "<h2>$project_information_title</h2>";
        echo $about_the_project;
    echo "</div>";
    echo "<div class='photography-project-info-images'>";
        echo "<ul class='$gallery_style'>";
            if (($gallery_style === 'hex-grid-rows') || ($gallery_style === 'hex-grid-columns-4'))
            {
                echo "<li><div class='empty-hex'></div></li>";
            }
            foreach ($project_images as $image)
            {
                $image_src = $image['sizes']['hex_grid_thumbnail'];
                echo "<li><div>";
                    echo "<img class='responsive' src='$image_src' alt=''/>";
                echo "</div></li>";
            }
        echo "</ul>";
    echo "</div>";
echo "</div>";

?>
