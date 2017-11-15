<?php // Shortcode Plugin - Loading Custom Scripts

// exit if file is called directly
if( !defined('ABSPATH')) { exit; }

// admin stylesheets and scripts
function ss_admin_scripts() {
    // checks if the current page is the admin page
    if(is_admin()) {
      wp_enqueue_style('ss-style-admin', plugin_dir_url(dirname(__FILE__)).'public/css/ss-style-admin.css', array(), null, 'screen');
      wp_enqueue_script('ss-scripts-admin', plugin_dir_url(dirname(__FILE__)).'public/js/ss-scripts-admin.js', array('jquery'), null, true);
    }

}

// add styles to admin header
add_action( 'admin_head', 'ss_admin_scripts' );


// public stylesheets and scripts
function ss_public_scripts() {
  // check if current page is either a post or a page

    wp_enqueue_style('ss-style-public', plugin_dir_url(dirname(__FILE__)).'public/css/ss-style-public.css', array(), null, 'screen');
    wp_enqueue_script('ss-scripts-public', plugin_dir_url(dirname(__FILE__)).'public/js/ss-scripts-public.js', array('jquery'), null, true);


}

// add styles to admin header
add_action('wp_enqueue_scripts', 'ss_public_scripts' );


// clean URL function
function clean_up_URLS($url) {
  $url = plugin_dir_path( __DIR__) . $url ;
  return $url;
}

 ?>
