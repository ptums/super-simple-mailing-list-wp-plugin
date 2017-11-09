<?php

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// Table Crud Operations
class TableOperations {

  // variables used through out operation methods
  private $wpdb;
  private $table_name;
  private $execute;
  private $flush;

  // making global $wpdb class avaiable to other functions
  public function __construct() {
    global $wpdb;
    $this->wpdb = $wpdb;

    // get table
    $this->table_name = $this->wpdb->prefix . "blog_subscribers_sh";
  }

  // execute query function
  public function execute_query($sql="") {
    //execute query
    $this->wpdb->query($sql);

    // flush cache
    $this->wpdb->flush();
  }

  // delete subscriber function
  public function delete_subscriber($id=[]) {

    // deletion query
    $sql = "DELETE FROM ".$this->table_name." WHERE id =".$id." LIMIT 1";

    // execute query
    $this->execute_query($sql);

  }

  // edit subscriber function
  public function edit_subscriber($id="", $email="", $categories="") {

    //sanitize values
    $ems = sanitize_text_field($email);
    $cats = sanitize_text_field($categories);

    // update query
    $sql ="UPDATE ".$this->table_name." SET email='".$ems."', categories='".$cats."' WHERE id=".$id." LIMIT 1";

    // execute query
    $this->execute_query($sql);

  }

  // create subscriber function
  public function create_subscriber($email="", $categories="") {

    // convert array to string

    // sanitize values

    // create query

    // check if email already exists

    // execute query

    // flush cache
    echo "hello World!";
  }



}
$table_operations = new TableOperations();
