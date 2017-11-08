<?php // MyPlugin - Admin Menu

// exit if file is called directly
if( !defined('ABSPATH')) {

  exit;

}

// add top-level administrative menu
function ssmailing_add_sublevel_menu() {

  add_submenu_page(
    'options-general.php',
    'SH-Law Blog Mailing List',
    'SH Blog Mailing List',
    'manage_options',
    'ssmailing',
    'ssmailing_display_settings_page'
  );
}
add_action('admin_menu', 'ssmailing_add_sublevel_menu');
