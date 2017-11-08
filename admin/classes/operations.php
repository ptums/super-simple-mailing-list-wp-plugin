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
  public function __construct(){
    global $wpdb;
    $this->wpdb = $wpdb;
    // get table
    $this->table_name = $this->wpdb->prefix . "blog_subscribers_sh";
  }

  // delete subscriber function
  public function delete_subscriber($id=[]){

    // deletion query
    $sql = "DELETE FROM ".$this->table_name." WHERE id =".$id." LIMIT 1";

    //execute query
    $this->wpdb->query($sql);

    // update row id numbers and flush cache
    $this->wpdb->flush();

  }

  // edit subscriber function
  public function edit_subscriber($id="", $email="", $categories=""){

    //sanitize values
    $ems = sanitize_text_field($email);
    $cats = sanitize_text_field($categories);

    // update query
    $sql ="UPDATE ".$this->table_name." SET email='".$ems."', categories='".$cats."' WHERE id=".$id." LIMIT 1";

    //execute query
    $this->wpdb->query($sql);

    // update row id numbers and flush cache
    $this->wpdb->flush();

  }

}
$table_operations = new TableOperations();
