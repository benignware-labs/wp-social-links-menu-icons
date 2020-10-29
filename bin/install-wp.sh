#!/usr/bin/env sh

# Install WordPress.
wp core install \
  --title="Social Links Menu Icons" \
  --admin_user="wordpress" \
  --admin_password="wordpress" \
  --admin_email="admin@example.com" \
  --url="http://localhost:8030" \
  --skip-email

# Update permalink structure.
wp option update permalink_structure "/%year%/%monthnum%/%postname%/" --skip-themes --skip-plugins

# Activate plugin.
wp plugin activate social-links-menu-icons

# Install twentyfifteen theme
wp theme install twentyfifteen

# Activate theme.
wp theme activate social-links-menu-icons