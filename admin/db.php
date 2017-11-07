<?php // Create Subscriber Database

// exit if file is called directly
if( !defined('ABSPATH')) {

  exit;

}

// create table
function subscriber_db () {
  // global wordpress database functions
  global $wpdb;

   // table name
   $table_name = $wpdb->prefix . "blog_subscribers_sh";

   // set charset for data...cleans up any conversion errors
   $charset_collate = $wpdb->get_charset_collate();

   // query to database
   $sql = "IF $table_name DOES NOT EXIST CREATE TABLE $table_name (
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
