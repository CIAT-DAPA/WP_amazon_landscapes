<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title>
      <?php bloginfo('name'); ?> |
      <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
    </title>
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/carousel.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|PT+Sans:400,400i,700,700i|PT+Serif:400,400i,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $( window ).load(function() {
        // Run code
        $(".cgspace").show(5000);
        });
      });
    </script> -->
    <script type="text/javascript">
      $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
      })
    </script>


  <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/unitegallery.min.js'></script>  
  <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/ug-theme-tilesgrid.js'></script>
  <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/ug-theme-slider.js'></script>

  <link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/css/unite-gallery.css' type='text/css' />
  






  </head>
  <body>
    <section class="header">
      <div class="blog-masthead">
        <div class="container">
          <div class="row">
            <div id="logo" class="col-md-5"></div>
            <div class="col-md-7 nav_container">
              <div class="widget_search">
                <?php get_search_form(); ?>
                 &nbsp;&nbsp;&nbsp;&nbsp; > 
                <nav class="lang-nav">
                  <?php
                    wp_nav_menu( array(
                    'menu'              => 'language',
                    'theme_location'    => 'language',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
                </nav>
              </div>
              <nav class="blog-nav">
                <?php
                  wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'bs-example-navbar-collapse-1',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
                  );
                  ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>