<?php //MyPlugin - Settings Callbacks

// exit if file is called directly
if( !defined('ABSPATH')) {

  exit;

}

// defualt
function ssmailing_section_no_list() {
  return "There is no table of subscribers";
}

// callback login section
function ssmailing_callback_section_login() {
  echo '<p>Here you can edit your subscriber list. Updating their email and selected categories.</p>';
}



// NEED TO FIGURE OUT A WAY TO BIND THE DATA IN THE ROW TO TEH DELETE BUTTON IN THE ROW ???

// build subscriber table
function ssmailing_callback_subscriber_table() {
  // query database for results
  global $wpdb;
  $result = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix.'blog_subscribers_sh');
  $table = "";
  $table .="<table id='ssmailing_table'><tbody><tr><th>id</th><th>Email</th><th>Categories</th><th>Actions</th></tr>";
  // and nail down which items, but which one has been check and match everything with that id
  foreach($result as $key => $value){
    $id = $value->id;
    $email = $value->email;
    $categories = $value->categories;
    $table .="<tr class='user-".$id."'>";
    $table .="<td name='tr[".$id."]'><input type='hidden' name='id[".$id."]' value='".$id."'/>".$id."</td>";
    $table .="<td><input name='email[".$id."]' id='email' value='".$email."' style='width:300px;'/></td>";
    $table .="<td><input name='categories[".$id."]' id='categories' value='".$categories."' style='width:100%;'/></td><td>";
    $table .="<input type='checkbox' name='edit_check[".$id."]' id='".$id."'/ value='Edit'>Edit</input> ";
    $table .="<input type='checkbox'  style='margin-left:10px;' name='delete_check[".$id."]' id='".$id."'/ value='Delete'>Delete</input></tr>";
  }
  $table .="</tbody></table>";
  echo $table;
  return $table ;
}




// add users to subscriber table
