<?php  // Plugin Settings



// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// check if user is allowed access
function ssmailing_display_settings_page(){
  if( ! current_user_can('manage_options')) return ;

  ?>

<?php

if(isset($_POST)){
  // load CRUD operations class to operate on table data
  require_once dirname(__FILE__) . '/classes/operations.php';

  $user_count = 0;
  if(isset($_POST['id'])){

    // default values
    $user_count = "";
    $sub_id = "";
    $sub_email = "";
    $sub_cat = "";
    $sub_edit = "";
    $sub_del = "";

    // update if specific date retrieved by POST request
    if(isset($_POST['id'])){
      $user_count = count($_POST['id']);
      $sub_id = $_POST['id'];
    }

    if(isset($_POST['email'])){
      $sub_email = $_POST['email'];
    }

    if(isset($_POST['categories'])){
      $sub_cat = $_POST['categories'];
    }

    if(isset($_POST['edit_check'])){
      $sub_edit = $_POST['edit_check'];
      // check for items set to be edited

    }

    // check if subscribers are set to be deleted
    if(isset($_POST['delete_check'])){
      $sub_del = $_POST['delete_check'];
      // check for items set to be deleted
        foreach ($sub_del as $key => $value){
          // run deletion operation


        }


        echo $hello_world_message;
    }
  }
}


?>
  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="" method="post">
      <?php

        // output security fields
        settings_fields('ssmailing_options_group');

        // output setting sessions
        do_settings_sections('ssmailing');

        submit_button();



       ?>
    </form>
  </div>
<?php }
