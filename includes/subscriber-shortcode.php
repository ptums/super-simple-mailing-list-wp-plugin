<?php // Shortcode Widget - Create Shortcode For Public Use

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }


// clean URL function
function clean_up_URLS($url) {
  $url = plugin_dir_path( __DIR__) . $url ;
  return $url;
}


// shortcode function
function sh_law_mailing_list() {
  // load CRUD operations class to operate on table data
  require_once clean_up_URLS('admin/classes/operations.php');

  $signup_form = "";
  $signup_form .= "<form action='' method='post'>";
  $signup_form .="<input type='text' name='user_email' value='Email Address'/>";
  $signup_form .="</input><br/>";
  $signup_form .="<span id='ssselect_category'>Select Category</span>";
  $signup_form .="</form>";
  //$table_operations->create_subscriber();

  return $signup_form;
}
