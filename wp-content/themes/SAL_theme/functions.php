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

 // Pagination function
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

// function comprobar_imagen_destacada( $post_id ) {
//   // elegimos los tipos de entrada que queremos tratar (sólo post aquí) 
//   if( get_post_type( $post_id ) != 'post' )
//       return;
//   if ( ! has_post_thumbnail( $post_id ) ) {
//     // creamos un transient para mostrar un mensaje de error
//     set_transient( "tiene_imagen", "no" );
//     // desactivamos el hook para evitar tener bucle infinito
//     remove_action( 'save_post', 'comprobar_imagen_destacada' );
//     // actualiza la entrada poniendola a draft
//     wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
//     // volvemos a activar el hook
//     add_action( 'save_post', 'comprobar_imagen_destacada' );
//   } else {
//     delete_transient( "tiene_imagen" );
//   }
// }
// function mostrar_error_no_hay_imagen() {
//   // Comprobamos si existe el transient y mostramos el error
//   if ( get_transient( "tiene_imagen" ) == "no" ) {
//     echo "<div id='message' class='error'><p><strong>Tienes que añadir una imagen destacada antes de poder publicar esto. No te preocupes, tu entrada se ha guardado bien.</strong></p></div>";
//     delete_transient( "tiene_imagen" );
//   }
// }
// add_action( 'save_post', 'comprobar_imagen_destacada' );
// add_action( 'admin_notices', 'mostrar_error_no_hay_imagen' );


// Logo personalizado en la página de login
function custom_login_logo() {
        echo '<style type="text/css">
        h1 a { background-image: url('.get_bloginfo('template_directory').'/img/logo.png) !important; }
        </style>';
}
add_action('login_head', 'custom_login_logo');