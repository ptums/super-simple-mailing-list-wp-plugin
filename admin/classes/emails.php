<?php


// Common Email execution tasks
class Emails {

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


  // retrieves user email address
  public function retrieve_subscriber_data() {

    // query table for list of emails
    $email_query =  $this->wpdb->get_results("SELECT * FROM ".$this->ss_table);

    // return list
    return $email_query;

  }

}
$send_off_email = new Emails();
