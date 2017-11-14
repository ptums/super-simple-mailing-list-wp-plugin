<?php // Create Subscriber Database

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// create subscriber table
function subscriber_db () {
  // global wordpress database functions
  global $wpdb;

   // table name
   $ss_table = $wpdb->prefix . "ss_subscribers";

   // set charset for data...cleans up any conversion errors
   $charset_collate = $wpdb->get_charset_collate();

   // query to database
   $sql = "CREATE TABLE $ss_table (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
     email VARCHAR (500) NOT NULL,
     categories VARCHAR(10000),
     PRIMARY KEY  (id)
   ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );

   // add version option
   add_option( "subscriber_db_version", "1.0" );


 }


 // create subscriber table
 function selected_category_db () {
   // global wordpress database functions
   global $wpdb;

    // table name
    $cat_table = $wpdb->prefix . "ss_selected_categories";

    // set charset for data...cleans up any conversion errors
    $charset_collate = $wpdb->get_charset_collate();

    // query to database
    $sql = "CREATE TABLE $cat_table (
      categories VARCHAR(100000)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    // add version option
    add_option( "subscriber_db_version", "1.0" );


  }
