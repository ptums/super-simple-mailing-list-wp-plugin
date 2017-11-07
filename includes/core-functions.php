<?php

// custom login styles
function shssmailing_custom_styles() {


    // enqueue proper styles
    wp_enqueue_style('ssh-plugin', plugin_dir_url(dirname(__FILE__)).'public/css/simple-mailinglist-plugin.css', array(), null, 'screen');
    wp_enqueue_script('ssh-plugin', plugin_dir_url(dirname(__FILE__)).'public/js/simple-mailinglist-plugin.js', array('jquery'), null, true);


}

// add styles to admin header
add_action( 'admin_head', 'shssmailing_custom_styles' );




 ?>
