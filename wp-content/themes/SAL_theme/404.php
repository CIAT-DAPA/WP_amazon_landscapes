<?php
/**
* The template for displaying 404 pages (Not Found)
*
* @package WordPress
* @subpackage Twenty_Thirteen
* @since Twenty Thirteen 1.0
*/
get_header(); ?>
  <div class="container">
    <header class="page-header">
      <h1 class="page-title"><?php _e( 'Not Found', 'twentyseventeen' ); ?></h1> </header>
    <div class="page-content">
      <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentyseventeen' ); ?></h2>
      <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>
      <!-- .page-content -->
      <?php get_sidebar(); ?>
    </div>
    <!-- #content -->
  </div>
  <?php get_footer(); ?>
