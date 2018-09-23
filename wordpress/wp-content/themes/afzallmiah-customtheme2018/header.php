<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <?php
            if( !defined( 'ABSPATH' ) ) { exit; }

            /* Classes Used In The Header
                main-menu
                main-menu-logo
                menu-right
                active
                end-menu-item
            */

            $logo_group = get_field('logo', 'option');
            $logo_colour = $logo_group['logo_colour'];
            $logo_colour_url = $logo_colour['url'];

            echo "<div class='main-menu'>";

                echo "<img class='main-menu-logo' src='$logo_colour_url'/>";

                echo "<ul class='menu-right'>";
                    $theme_locations = get_nav_menu_locations();
                    $menu_id = isset($theme_locations[ AM_Core::$MENU_MAIN_NAV ]) ? $theme_locations[ AM_Core::$MENU_MAIN_NAV ] : new WP_Error();

                    if (!is_wp_error($menu_id))
                    {
                        $menuitems = wp_get_nav_menu_items($menu_id);
                        if (!$menuitems)
                        {
                            $menuitems = array();
                        }

                        foreach ($menuitems as $index=>$item)
                        {
                            $link = $item->url;
                            $title = $item->title;
                            $target = empty($item->target) ? '' : "target='$item->target'";
                            $active_class = AM_Core::is_page_active($item) ? 'active' : '';
                            if ($item === end($menuitems))
                            {
                                $active_class = 'end-menu-item';
                            }

                            echo "<li class='$active_class'><a href='$link' $target>$title</a></li>";

                        }
                    }
                echo "</ul>";
            echo "</div>";

            ?>
	    </header>
        <main>
            <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->