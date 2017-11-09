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
    $this->table_name = $this->wpdb->prefix . "ss_subscribers";
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
    $check_query = "SELECT * FROM ".$this->table_name." WHERE email='".$email."' LIMIT 1";
    $verify_query = $this->wpdb->query($check_query);
    return $verify_query;
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
      $sql = "INSERT INTO ".$this->table_name." (`id`, `time`, `email`, `categories`) VALUES (default ,NOW(),'".$email."','".$cats."')";

      // execute query and update message
      $this->execute_query($sql);
      $message = "You've been added to our mailing list. Congratulations!";

    }else{
      $message = "";
    }

    // return a message
    return $message;
  }




}
$table_operations = new TableOperations();
