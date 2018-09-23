<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In This Flex-Content
    container
    wide-text-width
    total-center
    large-text
    flex-container
    flex-item
    third-width
    js--image-container-caption-overlay
    responsive
    image-caption
*/

$show_photography_projects_block = get_field('show_photography_projects_block'); // True (Default) or False

if ($show_photography_projects_block === true)
{
    $photography_projects_block = get_field('photography_projects_block'); // Group
    $title = $photography_projects_block['photography_projects_block_title']; // Text
    $text_colour = $photography_projects_block['text_colour']; // Colour Picker
    $background_colour = $photography_projects_block['background_colour']; // Colour Picker
    $content = $photography_projects_block['photography_projects_block_content']; // WYSIWYG
    $selected_photography_projects = $photography_projects_block['selected_photography_projects']; // Repeater of Post Objects - Type: Photography Project

    if ($selected_photography_projects)
    {
        echo "<div class='container' style='background: $background_colour; color: $text_colour;'>";
            echo "<div class='wide-text-width total-center large-text'>";
                echo "<h2 class='container-header'>$title</h2>";
                echo $content;
            echo "</div>";
            echo "<div class='flex-container'>";

            foreach ($selected_photography_projects as $selected_project)
            {
                $project = $selected_project['project'];
                $project_title = get_the_title($project);
                $project_link = get_permalink($project);

                echo "<div class='flex-item third-width js--image-container-caption-overlay'>";
                    echo "<a href='$project_link'>";
                        echo get_the_post_thumbnail($project->ID, 'photography_project_block_thumbnail', array(
                                'class'=> 'responsive',
                                'alt' => ''
                                ));
                        echo "<div class='image-caption'>";
                            echo $project_title;
                        echo "</div>";
                    echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        echo "</div>";
    }
}

?>
