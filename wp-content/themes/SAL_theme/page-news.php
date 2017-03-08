<?php get_header(); ?>
<div class="container noticia">
  <h2 class="blog-post-title">
    - Noticias -
  </h2>
  <!-- 1st row -->
  <div class="row">
    <!-- left side 1 -->
    <div id="news-side-left" class="col-md-8">
           <?php
// query_posts('category_name=News'); 
$args=array(
'showposts' => 1,
'category_name' => 'Noticia',
'order' => 'DESC',
);
$post_query = new WP_Query($args); 
?>

   <?php if($post_query->have_posts()) : ?>
          <?php while($post_query->have_posts()) : $post_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php if(has_post_thumbnail()) : ?>
            <div class="post-thumb">
              <?php the_post_thumbnail(); ?> </div>
            <?php else : ?>
            <a img class="post-thumb">
              <?php if ( function_exists( 'get_post_image' ) ) get_post_image( 0, true ); ?> </a>
            <?php endif; ?>
            <?php the_title(); ?> </a>
          <?php endwhile; ?>
          <?php else : ?>
          <?php __('No Posts Found'); ?>
          <?php endif; ?>



      <?php while (have_posts()) : the_post(); ?> <img alt="<?php the_title(); ?>" src=<?php the_post_thumbnail_url(); ?>>
      <p><small><?php the_time('F jS, Y') ?> / por <?php the_author() ?> </small></p>
      <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3> </a>
      <p>
        <?php the_content(); ?>
      </p>
      <?php endwhile;?> </div>
    <!-- right side 1 -->
    <div id="news-side-right" class="col-md-3">
      <h3>LO MÁS LEÍDO...</h3>
      <?php
        // get our tags as an array
        $tags = wp_tag_cloud('format=array');
        // loop through each tag in the array
          $popularTag = $tags[0];

      $the_query = new WP_Query( array( 'tag' => 'tag1', 'posts_per_page' => '10') );

      // The Loop
      if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post(); 
        // Do Stuff
      ?>
        <div class="box-news"> <small><?php the_time('F jS, Y') ?> / por <?php the_author() ?> </small>
          <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4> </div>
        <?php
      endwhile;
      endif;
      // Reset Post Data
      wp_reset_postdata();

      ?>
          <?php while (have_posts()) : the_post(); ?>
          <?php endwhile;?> </div>
    <div id="news-side-right" class="col-md-1"> </div>
  </div>
  <!-- end 1st row  -->
  <!-- 2nd row  -->
  <!-- <div class="row"> -->
  <!-- left side 2 -->
  <!-- <div class="col-md-8"> -->
  <!-- </div> -->
  <!-- right side 2 -->
  <!-- <div class="col-md-3"> -->
  <!-- </div> -->
  <!-- </div> -->
  <!-- end 2nd row  -->
  <!-- 3srdrow  -->
  <div class="row">
    <div id="gridcontainer">
      <?php
          $counter = 1; //start counter
          
          $grids = 3; //Grids per row
          
          global $query_string; //Need this to make pagination work
            
          
          /*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
          query_posts($query_string . '&ignore_sticky_posts=1&posts_per_page=6');
          
          
          if(have_posts()) :  while(have_posts()) :  the_post(); 
          ?>
        <?php
          //Show the left hand side column
          if($counter == 1 or $counter == 2) :
          ?>
          <div class="col-md-4">
            <div class="postimage">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(array(150, 150)); ?>
              </a> <small><?php the_time('F jS, Y') ?> / por <?php the_author() ?> </small> </div>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> </div>
          <?php
          //Show the right hand side column
          elseif($counter == $grids) :
          ?>
            <div class="col-md-4" ">
          <div class="postimage ">
            <a href="<?php the_permalink(); ?>" title="
              <?php the_title_attribute(); ?>">
              <?php the_post_thumbnail(array(150, 150)); ?>
              </a> <small><?php the_time('F jS, Y') ?> / por <?php the_author() ?> </small> </div>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> </div>
    <?php
          $counter = 0;
          endif;
          ?>
      <?php
          $counter++;
          endwhile;
          //Pagination can go here if you want it.
          endif;
          ?>
  </div>
</div>
</div>
<!-- end 3rd row  -->
</div>
<?php get_footer(); ?>
