<?php
/*
Plugin Name: SH SS Mailing Widget
Description: a simple plugin that will build an editable mailing list and send out recent blog posts based on category.
Plugin URI: https://github.com/ptums/wp-plugin-dev-sandbox
Author: PTums
Version: 1.0
Text Domain: shssmailingwidget
Domain Path: /license.txt
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

// if user is in admin area
if (is_admin() ){

  // include dependencies
  require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
  require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';
  require_once plugin_dir_path(__FILE__) . 'includes/subscriber-shortcode.php';

}

// load or create table schema and data on plugin activation
require_once plugin_dir_path(__FILE__) . 'admin/db.php';
register_activation_hook( __FILE__, 'subscriber_db' );


// Email Creation

require_once plugin_dir_path(__FILE__) . 'admin/classes/emails.php';
function email_subscriber_latest_post($email="", $categories=""){

  return $email. " ". $categories;

}

// add an action to fire off this function when a new blog post is published





?>
