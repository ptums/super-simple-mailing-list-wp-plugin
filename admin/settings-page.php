<?php  // Plugin Settings

// exit if file is called directly
if( !defined('ABSPATH')) {

  exit;

}

// check if user is allowed access
function ssmailing_display_settings_page(){
  if( ! current_user_can('manage_options')) return ;

  ?>

<?php



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



       ?>
    </form>
  </div>
<?php }
