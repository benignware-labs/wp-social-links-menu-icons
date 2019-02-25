<?php

/**
 Plugin Name: Social Links Menu Icons
 Plugin URI: https://github.com/benignware-labs/wp-social-links-menu-icons
 Description: Show icons in social menu easily
 Version: 0.0.5
 Author: Rafael Nowrotek, Benignware
 Author URI: http://benignware.com
 License: MIT
*/

add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
  $icon_type = isset($args->social_icon_type) ? $args->social_icon_type : "css";
  $icon_prefix = isset($args->social_icon_prefix) ? $args->social_icon_prefix : (($icon_type === 'svg') ? "icon-" : "genericon genericon-");
  $menu_name = is_string($args->menu) ? $args->menu : $args->menu->name;
  $is_social_menu = (strpos(trim(strtolower($menu_name)), 'social') !== false);
  if ( $is_social_menu ) {
    $title = trim($item->title);
    $icon_name = strtolower(
      preg_replace(
        ["/([A-Z]+)/", "/_([A-Z]+)([A-Z][a-z])/"],
        ["_$1", "_$1_$2"],
        lcfirst($title)
      )
    );
    $icon_prefixed_name = $icon_prefix . $icon_name;
    $atts['title'] = $title;
    if ($icon_type === 'svg') {
      $item->title = "<svg><use xlink:href=\"#$icon_prefixed_name\"/></svg>";
    } else {
      $item->title = "<i class=\"$icon_prefixed_name \"> </i>";
    }
    if (!$atts['target']) {
      $atts['target'] = '_blank';
    }
  }
  return $atts;
}, 10, 3 );

?>
