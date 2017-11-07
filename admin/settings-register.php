<?php //MyPlugin - Register Settings

// exit if file is called directly
if( !defined('ABSPATH')) {

  exit;

}

// register plugin settings
function ssmailing_register_settings() {

  /*
  register_settings(
    string $option_group,
    string $option_name,
    callable $sanitize_callback
  )
  */

  //register settings array
  register_setting(
    'ssmailing_options_group',
    'ssmailing_options_name',
    'ssmailing_callback_validate_options'
  );

  /*
  add_settings_section(
    string $id,
    string $title,
    callable $callback,
    string $page
  )
  */

  add_settings_section(
    'ssmailing_section_login',
    'List of Subscribers',
    'ssmailing_callback_section_login',
    'ssmailing'
  );



  /*
  add_settings_field(
    string $id,
    string $title,
    callable $callbackm
    string $page,
    string $section = 'default',
    array $args = []
  )
  */

  add_settings_field(
    'subscriber_table',
    '',
    'ssmailing_callback_subscriber_table',
    'ssmailing',
    'ssmailing_section_login',
    ['id' => 'subscriber_table', 'label' => 'Full list of subscribers and their selected categories']
  );



}

add_action('admin_init', 'ssmailing_register_settings');
