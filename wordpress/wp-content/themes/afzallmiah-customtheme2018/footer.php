<?php
if( !defined( 'ABSPATH' ) ) { exit; }

/* Classes Used In The Footer
	footer-logo-div
	footer-logo
	footer-social-media
	indv-social-media-icon-fixed-bottom
	footer-menu-and-copyright
	footer-menu
	footer-copyright
*/

$logo_group = get_field('logo', 'option');
$logo_colour = $logo_group['logo_colour'];
$logo_colour_url = $logo_colour['url'];

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

$copyright_label = get_field('copyright_details', 'option');

echo "</main>";
echo "<footer>";

echo "<div class='footer-logo-div'>";
	echo "<img class='footer-logo' src='$logo_colour_url'/>";
echo "</div>";

echo "<div class='footer-social-media'>";
	if ($facebook_link)
	{
	echo "<a href='$facebook_link'><img class='indv-social-media-icon-fixed-bottom' src='$facebook_icon_white_URL'/></a>";
	}
	if ($twitter_link)
	{
	echo "<a href='$twitter_link'><img class='indv-social-media-icon-fixed-bottom' src='$twitter_icon_white_URL'/></a>";
	}
	if ($instagram_link)
	{
	echo "<a href='$instagram_link'><img class='indv-social-media-icon-fixed-bottom' src='$instagram_icon_white_URL'/></a>";
	}
	if ($linkedin_link)
	{
	echo "<a href='$linkedin_link'><img class='indv-social-media-icon-fixed-bottom' src='$linkedin_icon_white_URL'/></a>";
	}
echo "</div>";

echo "<div class='footer-menu-and-copyright'>";
	echo "<div class='footer-menu'>";
		echo "<ul>";
			$theme_locations = get_nav_menu_locations();
			$menu_id = isset($theme_locations[ AM_Core::$MENU_FOOTER_NAV ]) ? $theme_locations[ AM_Core::$MENU_FOOTER_NAV ] : new WP_Error();
			if (!is_wp_error($menu_id))
			{
				$menuitems = wp_get_nav_menu_items( $menu_id );
				if (!$menuitems) {
					$menuitems = array();
				}

				foreach ($menuitems as $item)
				{
					$link = $item->url;
					$title = $item->title;
					$target = empty($item->target) ? '' : "target='$item->target'";
					echo "<li><a href='$link' $target>$title</a></li>";
				}
			}
		echo "</ul>";
	echo "</div>";
	echo "<div class='footer-copyright'>";
		echo "<p>&copy; $copyright_label</p>";
		echo "<p>Website made by Suzie Douglas</p>";
	echo "</div>";
echo "</div>";

echo "</footer>";
wp_footer();
echo "</body>";
echo "</html>";
?>