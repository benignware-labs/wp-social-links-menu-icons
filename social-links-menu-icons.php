<?php

/**
 Plugin Name: Social Links Menu Icons
 Plugin URI: https://github.com/benignware-labs/wp-social-links-menu-icons
 Description: Show icons in social menu easily
 Version: 0.0.8
 Author: Rafael Nowrotek, Benignware
 Author URI: http://benignware.com
 License: MIT
*/

add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
  $icon_type = isset($args->social_icon_type) ? $args->social_icon_type : 'css';

  // @deprecated: `social_icon_prefix` is deprecated, use `social_icon_pattern` instead
  if ($args->social_icon_prefix) {
    $icon_pattern = $args->social_icon_prefix . '%s';
  } else {
    $icon_pattern = isset($args->social_icon_pattern) ? $args->social_icon_pattern : ($icon_type === 'svg' ? "icon-%s" : "genericon genericon-%s");
  }

  $menu_name = is_string($args->menu) ? $args->menu : $args->menu->name;
  $is_social_menu = (strpos(trim(strtolower($menu_name)), 'social') !== false);

  if ($is_social_menu) {
    $title = trim($item->title);
    $icon_name = strtolower(
      preg_replace(
        ["/([A-Z]+)/", "/_([A-Z]+)([A-Z][a-z])/"],
        ["-$1", "-$1-$2"],
        lcfirst($title)
      )
    );
    $icon_name = apply_filters(
      'social_links_menu_icons_name',
      $icon_name,
      $title
    );
    $icon_class = sprintf($icon_pattern, $icon_name);

    $atts['title'] = $title;
    if ($icon_type === 'svg') {
      $item->title = "<svg><use xlink:href=\"#$icon_class\"/></svg>";
    } else {
      $item->title = "<i class=\"$icon_class\"> </i>";
    }
    if (!$atts['target']) {
      $atts['target'] = '_blank';
    }
  }

  return $atts;
}, 1, 3 );
