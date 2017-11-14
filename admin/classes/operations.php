<?php

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// Table Crud Operations
class TableOperations {

  // variables used through out operation methods
  private $wpdb;
  private $ss_table;
  private $cat_table;
  private $execute;
  private $flush;

  // making global $wpdb class avaiable to other functions
  public function __construct() {
    global $wpdb;
    $this->wpdb = $wpdb;

    // get subscriber table
    $this->ss_table = $this->wpdb->prefix . "ss_subscribers";

    // get categories table
    $this->cat_table = $this->wpdb->prefix . "ss_selected_categories";
  }

  // execute query function
  public function execute_query($sql="") {
    //execute query
    $this->wpdb->query($sql);

    // flush cache
    $this->wpdb->flush();
  }

  // check if entry exists function
  public function check_entry_exists($email="") {
    $check_query = "SELECT * FROM ".$this->ss_table." WHERE email='".$email."' LIMIT 1";
    $verify_query = $this->wpdb->query($check_query);
    return $verify_query;
  }

  // delete subscriber function
  public function delete_subscriber($id=[]) {

    // deletion query
    $sql = "DELETE FROM ".$this->ss_table." WHERE id =".$id." LIMIT 1";

    // execute query
    $this->execute_query($sql);

  }

  // edit subscriber function
  public function edit_subscriber($id="", $email="", $categories="") {

    //sanitize values
    $ems = sanitize_text_field($email);
    $cats = sanitize_text_field($categories);

    // update query
    $sql ="UPDATE ".$this->ss_table." SET email='".$ems."', categories='".$cats."' WHERE id=".$id." LIMIT 1";

    // execute query
    $this->execute_query($sql);

  }

  // create subscriber function
  public function create_subscriber($email="", $categories="") {

    // convert array to string
    $cats = implode(",", $categories);
    // sanitize values
    $email = sanitize_text_field($email);
    $cats = sanitize_text_field($cats);

    //confirmation message
    $message;

    //check and execute query
     $check_entry = $this->check_entry_exists($email);

    // run query if entry does not exist
    if($check_entry){

      // create message
      $message ="Sorry this email already exists.";

    }else if(!$check_entry){

      // insert query
      $sql = "INSERT INTO ".$this->ss_table." (`id`, `time`, `email`, `categories`) VALUES (default ,NOW(),'".$email."','".$cats."')";

      // execute query and update message
      $this->execute_query($sql);
      $message = "You've been added to our mailing list. Congratulations!";

    }else{
      $message = "";
    }

    // return a message
    return $message;
  }


  // Insert Cateory Table
  public function insert_categories_table($categories="") {

    // sanitize data before building query
    $cats = sanitize_text_field($categories);

    // build query remove current data and add new data

    $del = "TRUNCATE TABLE ".$this->cat_table;
    $sql = "INSERT INTO ".$this->cat_table." (`categories`) VALUES ('".$cats."')";

    // remove all current categories
    $this->execute_query($del);

    // execute query
    $this->execute_query($sql);

  }

  // Retrieve categories in Category table
  public function retreive_categories_table() {

  }

}
$table_operations = new TableOperations();
