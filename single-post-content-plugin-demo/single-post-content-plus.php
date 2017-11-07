<?php

/**
* Plugin Name: Single Post Content Plus
* Description: Adds a sidebar/widget aka to single post
* Version: 0.1.0
* Author: Peter Tumulty
* Author URI: https://ptums.me
* Text Domain: spcp
* License: GPL-2.0+
* Github Plugin URI: https://github.com/cdils/single-post-content-plus
**/


// If this file is called directly, abort
if(!defined('ABSPATH')) {
  die;
}

/**
* Load custom stylehseet on login page
**/

add_action('wp_enqueue_scripts', 'spcp_wp_stylesheet');
function spcp_wp_stylesheet() {

  if(apply_filters('spcp_load_styles', true)){
    wp_enqueue_style('spc-stylesheet', plugin_dir_url(__FILE__). 'spcp-styles.css');
  }
}

// Uncomment the following line to keep custom style sheet from loading
// add_filter('spcp_load_styles', '__return false');

/**
* Register sidebar
**/

add_action('widgets_init', 'spcp_register_sidebar');
function spcp_register_sidebar(){
  // register sidebar
  register_sidebar(array(
    'name'             => __('Post Content Plus', 'spcp'),
    'id'               => 'spcp-sidebar',
    'description'      => __('Widgets in this area display on single posts', 'spcp'),
    'before_widget'    => '<div class="widget spcp-sidebar">',
    'after_widget'     => '</div>',
    'before_title'     => '<h2 class="widgettitle spcp-title">',
    'after_title'      => '</h2>'
  ) );
}

add_filter('the_content', 'spcp_display_sidebar');
/**
* Display sidebar on single posts.
*
**/
function spcp_display_sidebar($content) {

  if(is_single() && is_active_sidebar('spcp-sidebar') && is_main_query() ){
    dynamic_sidebar('spcp-sidebar');
  }

  return $content;
}

 ?>
