<?php // Shortcode Widget - Create Shortcode For Public Use

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// clean URL function
function clean_up_URLS($url) {
  $url = plugin_dir_path( __DIR__) . $url ;
  return $url;
}

// shortcode function
function ss_subscriber() {

  // declare variables that will be used in POST and clearing them if they are defined
  $email = "";
  $selected_categories = array();
  // load CRUD operations class to operate on table data
  require_once clean_up_URLS('admin/classes/operations.php');

  // retrieve and post values selected by user
  if(isset($_POST)){

    // check if there is a value for 'email'
    if(isset($_POST['user_email'])){
      $email = $_POST['user_email'];
    }

    // check if there is a value for 'categories'
    if(isset($_POST['cat'])){
      foreach($_POST['cat'] as $cat){
        $selected_categories[] = $cat;
      }
    }

    // insert data into database
    $create_user = $table_operations->create_subscriber($email, $selected_categories);


  }else{
    $email = "";
    $selected_categories = array();
  }

  $category_list = array();


  // loop through categories and push names into category_list

  foreach(get_categories() as $cat) {
    // remove uncategorized from list
    if($cat->name !== "Uncategorized") {
        $category_list[] = $cat->name;
    }
  }


  // buildout HTML for form and render it to DOM
  $signup_form = "";
  $signup_form .= "<form action='' method='post'>";
  $signup_form .="<input type='email' name='user_email' value='Email Address'/>";
  $signup_form .="</input><br/>";
  $signup_form .="<span id='ssselect_category' class='ssselect_item_center'>Select Category</span>";
  $signup_form .= "<div id='sselect_category_list'>";
  $signup_form .= "<ul>";

  foreach($category_list as $item) {
    $signup_form .="<li><div><input type='checkbox' name='cat[]' value='".$item."' class='sscat_item'id='".$item."'>";
    $signup_form .= "<label class='sscat_label' for='".$item."'>".$item."</label></div></li>";
  }
  $signup_form .= "</ul><input type='submit' id='sssubscribe_button' class='ssselect_item_center' value='Subscribe'/></div>";
  $signup_form .="</form>";


  return $signup_form;
}
