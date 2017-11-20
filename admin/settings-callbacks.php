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

// clean URL function


// build subscriber table
function ssmailing_callback_subscriber_table() {
  // query database for results
  global $wpdb;
  $result = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix.'ss_subscribers');



  /**
  * Build Table
  **/

  // Initialize table
  $table = "";

  $table .= "<div id='available_cats'><strong>Available Categories: </strong><br/>";
  // Build out selected categories
  foreach(get_categories() as $cat) {

    // remove uncategorized from list and iterate over categories
    if($cat->name !== "Uncategorized") {
      $name = $cat->name;
      $id =  $cat->id;
      $table .="<div class='selection_input'><input type='checkbox' class='cat_selection' name='selected_cat[".$id."]' id='".$id."'/ value='".$name."'><span class='cat_name'>".$name."</span></input></div>";
    }

  }

  $table .="</div>";

  // Loop through categories so people can copy and paste them
  if($result){

  $table .="<table id='ssmailing_table'><tbody><tr><th>Email</th><th>Categories</th><th>Actions</th></tr>";

  // loop through all data retrieved from query to db
  foreach($result as $key => $value){
    $id = $value->id;
    $email = $value->email;
    $categories = $value->categories;
    $table .="<tr class='user-".$id."'>";
    $table .="<td><input type='hidden' name='id[".$id."]' value='".$id."'/><input type='text' name='email[".$id."]' class='email' value='".$email."' style='width: 280px;'/></td>";
    $table .="<td><input type='textarea' name='categories[".$id."]' class='categories' value='".$categories."' style='width:500px;'/></td><td>";
    $table .="<input type='checkbox' class='edit_selection'name='edit_check[".$id."]' id='".$id."'/ value='Edit'>Edit</input> ";
    $table .="<input type='checkbox'  style='margin-left:10px;' name='delete_check[".$id."]' id='".$id."'/ value='Delete'>Delete</input></tr>";
  }

  $table .="</tbody></table>";
  echo $table;

}else{

  $table = "<span style='position:relative; right:28%;'>Start getting subscribers!</span>";
  echo $table;

}


}
