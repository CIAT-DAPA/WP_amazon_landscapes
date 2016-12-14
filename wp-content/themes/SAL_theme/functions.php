<?php
  // Register Nav Walker class_alias
  require_once('wp_bootstrap_navwalker.php');

  // Theme Support
  function wpb_theme_setup(){
    add_theme_support('post-thumbnails');

    // Language Menu
    register_nav_menus(array(
      'language' => __('Language Menu')
    ));

    // Nav Menus
    register_nav_menus(array(
      'primary' => __('Primary Menu')
    ));

    // Post Formats
    // add_theme_support('post-formats', array('aside', 'gallery'));
  }

  add_action('after_setup_theme','wpb_theme_setup');

// Excerpt Length Control
function set_excerpt_length(){
  return 45;
}

add_filter('excerpt_length', 'set_excerpt_length');

// Widget Locations
function wpb_init_widgets($id){

  register_sidebar(array(
    'name'  => 'Header',
    'id'    => 'header',
    'before_widget' => '<div class="header-sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ));


  register_sidebar(array(
    'name'  => 'Sidebar',
    'id'    => 'sidebar',
    'before_widget' => '<div class="sidebar-module">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ));

  // register_sidebar(array(
  //   'name'  => 'Box1',
  //   'id'    => 'box1',
  //   'before_widget' => '<div class="box">',
  //   'after_widget'  => '</div>',
  //   'before_title'  => '<div class="tag-black">',
  //   'after_title'   => '</div>'
  // ));

  register_sidebar(array(
    'name'  => 'Footer',
    'id'    => 'footer',
    'before_widget' => '<div class="footer-sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ));
}

add_action('widgets_init', 'wpb_init_widgets');

// Customizer File
require get_template_directory(). '/inc/customizer.php';

// Custom login logo
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/logo_login.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

function get_post_image( $iImageNumber = 0, $bPrint = false )
{
    global $post;
    $szPostContent = $post->post_content;
    $szSearchPattern = '~<img [^\>]*\ />~';
    preg_match( $szSearchPattern, $szPostContent, $pics );
    if ( $bPrint == true && !empty($pics) ) echo $pics[$iImageNumber]; else return $pics[$iImageNumber];
}