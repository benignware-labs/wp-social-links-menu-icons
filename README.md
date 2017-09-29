# Social Menu Icons Wordpress Plugin
> Show icons in social menu easily

This plugin works by replacing link text in your social menu with corresponding css or svg icons. You can find a similar implementation in Wordpress' most recent theme [Twenty Seventeen](https://github.com/WordPress/twentyseventeen/blob/master/inc/icon-functions.php#L104).

## Usage

By default the plugin assumes genericons present on your assets and generates css classes of the form `genericon genericon-{name}`. This can be controlled by providing the `social_icon_prefix`-option. For example, if you're using [Font Awesome](http://fontawesome.io/), you would adjust this to match `fa fa-{name}` like this:

```php
function social_nav_menu_args($args) {
  $args['social_icon_prefix'] = 'fa fa-';
  return $args;
}
add_filter( 'wp_nav_menu_args', 'social_nav_menu_args', 1, 2 );
```
