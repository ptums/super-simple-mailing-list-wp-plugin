<?php // Shortcode Widget - Email Action Function
//require_once("../../../../wp-load.php");
// exit if file is called directly
if( !defined('ABSPATH')) { exit; }



function send_post_notification_to_subscriber() {

  // Retrieve subscriber email and selected categories from database
  function subscriber_data(){
    // Load Email Class functions
    require_once clean_up_URLS('admin/classes/emails.php');

    // get subscriber email and selected categories
    $email_list = $send_off_email->retrieve_subscriber_data();

    // return results
    return $email_list;
  }


  // function to get latest post id
  function get_recent_post_id(){

    // grab the latest post id
    $args = array('numberposts' => 1);
    $recent_post = wp_get_recent_posts($args);
    $post_id = $recent_post[0]["ID"];

    // return the latest posts category name
    return $post_id;

  }

  // get post title, date, and content
  function get_post_content($id="") {


    $post_content = array();
    $post_content[] = get_post($id)->post_title;
    $post_content[] = get_post($id)->post_date;
    $post_content[] = get_post($id)->post_content;
    $post_content[] = get_post($id)->guid;


    return $post_content;
  }

  // send out email
  function send_email($email = "" , $id) {
      //retrieve post data
      $content = get_post_content($id);

      // Build out body of email
      if((isset($email)) && (isset($content))){

        // Build out email and execute
        $subject = "New Post From ".get_bloginfo()." - ".$content[0];
        $message = "<strong><a href= '".$content[3]."'>".$content[0]."</a></strong> - ".$content[1]."<br/>".$content[2];
        

        echo wp_mail( $email, $subject, $message, $headers='Sent From: info@sh-law.com', $attachments="");
        // alert admin the success or failure of the email execution
        // if($sent_email) {
        //   echo "This is working..";
        //   echo "true";
        //   return true;
        // }else{
        //   echo "This isn't working..";
        //   echo "false";
        //   return false;
        // }
      }

  }

  // match if the category of the post is the same selected by the subscriber
  foreach(subscriber_data() as $ss) {
    // retrieve subscriber data from table
    $email = $ss->email;
    $cats = $ss->categories;
    $cats = explode(",",$cats);

    // retrieve latest post category
    $category_name = get_the_category(get_recent_post_id())[0]->name;

    // check if user selected category matches the category of the recent post
    foreach($cats as $c){
      if($c == $category_name) {
        send_email($email, get_recent_post_id());
      }
    }
  }


}
