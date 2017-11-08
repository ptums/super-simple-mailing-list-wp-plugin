<?php // Shortcode Widget - Create Shortcode For Public Use

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// shortcode function
function sh_law_mailing_list(){
  // load CRUD operations class to operate on table data
  require_once dirname(__FILE__) . '../admin/classes/operations.php';
  
  return "Scarinci Hollenbeck Mailing List short code will go here";
}
