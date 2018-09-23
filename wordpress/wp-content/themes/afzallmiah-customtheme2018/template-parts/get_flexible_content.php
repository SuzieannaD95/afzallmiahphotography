<?php
if( !defined( 'ABSPATH' ) ) { exit; }

$flexible_fields = get_field('flexible_content_blocks');

if (!$flexible_fields)
{
    $flexible_fields = array(array('acf_fc_layout' => ''));
}

foreach ($flexible_fields as $i => $field)
{
    $layout = $field['acf_fc_layout'];
    $template = locate_template( 'template-parts/flexible-content-blocks/'.$layout.'.php', false );
    if (file_exists($template))
    {
        include $template;
    }
}

get_template_part('template-parts/photography_projects_block');

?>