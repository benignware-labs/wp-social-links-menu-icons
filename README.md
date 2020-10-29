# wp-social-links-menu-icons

Show icons in social menu easily

This plugin works by replacing link text in your social menu with corresponding css or svg icons. You can find a similar implementation in Wordpress' most recent theme [Twenty Seventeen](https://github.com/WordPress/twentyseventeen/blob/master/inc/icon-functions.php#L104).

## Usage

By default the plugin assumes genericons present on your assets and generates css classes of the form `genericon genericon-{name}`. This can be controlled by providing the `social_icon_prefix`-option. For example, if you're using [Font Awesome](http://fontawesome.io/), you would adjust this to match `fa fa-{name}` like this:

```php
function social_nav_menu_args($args) {
  $args['social_icon_pattern'] = 'fab fa-outline fa-lg fa-%1$s fa-%1$s-f';

  return $args;
}
add_filter( 'wp_nav_menu_args', 'social_nav_menu_args', 1, 1 );
```

### Customize icon class name

You may customize the generated css class by adding to `social_links_menu-icons.php` filter:

```php
add_filter( 'social_links_menu_icons_name', function($name) {
	return preg_replace('~linked-in~', 'linkedin', $name);
}, 1, 1 );
```

## Development

Download [Docker CE](https://www.docker.com/get-docker) for your OS.

### Environment

Point terminal to your project root and start up the container.

```cli
docker-compose up -d
```

Setup wordpress

```shell
docker-compose run --rm wp wp-install
```

Open your browser at [http://localhost:8030](http://localhost:8030).

### Useful docker commands

#### Startup services

```cli
docker-compose up -d
```
You may omit the `-d`-flag for verbose output.

#### Shutdown services

In order to shutdown services, issue the following command

```cli
docker-compose down
```

#### List containers

```cli
docker-compose ps
```

#### Remove containers

```cli
docker-compose rm
```

#### Open bash

Open bash at wordpress directory

```cli
docker-compose exec wordpress bash
```

#### Update composer dependencies

If it's complaining about the composer.lock file, you probably need to update the dependencies.

```cli
docker-compose run composer update
```

###### List all globally running docker containers

```cli
docker ps
```

###### Globally stop all running docker containers

If you're working with multiple docker projects running on the same ports, you may want to stop all services globally.

```cli
docker stop $(docker ps -a -q)
```

###### Globally remove all containers

```cli
docker rm $(docker ps -a -q)
```

##### Remove all docker related stuff

```cli
docker system prune
```
