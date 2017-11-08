<?php //MyPlugin - Settings Callbacks

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// defualt
function ssmailing_section_no_list() {
  return "There is no table of subscribers";
}

// callback login section
function ssmailing_callback_section_login() {
  echo '<p>Here you can edit your subscriber list. Updating their email and selected categories.</p>';
}


// build subscriber table
function ssmailing_callback_subscriber_table() {
  // query database for results
  global $wpdb;
  $result = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix.'blog_subscribers_sh');
  $site_categories = get_categories();
  $table = "";

  /**
  * Build Table
  **/

  // Loop through categories so people can copy and paste them

  $table .="</h3><table id='ssmailing_table'><tbody><tr><th>Email</th><th>Categories</th><th>Actions</th></tr>";
  // loop through all data retrieved from query to db
  foreach($result as $key => $value){
    $id = $value->id;
    $email = $value->email;
    $categories = $value->categories;
    $table .="<tr class='user-".$id."'>";
    $table .="<td><input type='hidden' name='id[".$id."]' value='".$id."'/><input type='text' name='email[".$id."]' id='email' value='".$email."' style='width: 280px;'/></td>";
    $table .="<td><input type='textarea' name='categories[".$id."]' id='categories' value='".$categories."' style='width:500px;'/></td><td>";
    $table .="<input type='checkbox' name='edit_check[".$id."]' id='".$id."'/ value='Edit'>Edit</input> ";
    $table .="<input type='checkbox'  style='margin-left:10px;' name='delete_check[".$id."]' id='".$id."'/ value='Delete'>Delete</input></tr>";
  }
  $table .="</tbody></table>";
  echo $table;
  return $table ;
}




// add users to subscriber table
