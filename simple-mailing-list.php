<?php
/*
Plugin Name: SS Mailing Widget
Description: a simple plugin that will build an editable mailing list and send out recent blog posts based on category.
Plugin URI: https://github.com/ptums/wp-plugin-dev-sandbox
Author: PTums
Version: 1.0
Text Domain: ssmailingwidgetp
Domain Path: /license.txt
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

// load style and script resources
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';

// load functions from pluggable to allow the use of wp_mail
require_once clean_up_URLS("../../../wp-includes/pluggable.php");

// if user is in admin area
if (is_admin() ) {
  // include dependencies files to create admin area pages and features
  require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';

}

// Load or create table schema and data on plugin activation
require_once plugin_dir_path(__FILE__) . 'admin/db.php';
register_activation_hook( __FILE__, 'subscriber_db' );
register_activation_hook( __FILE__, 'selected_category_db' );

// Shortcode Creation
require_once plugin_dir_path(__FILE__) . 'includes/subscriber-shortcode.php';
add_shortcode('ss_subscriber', 'ss_subscriber');

// Subscriber Email Post Creation
require_once plugin_dir_path(__FILE__) . 'includes/email-creation.php';
add_action('publish_post', 'send_post_notification_to_subscriber');

// New Subscriber Welcome Email

?>
