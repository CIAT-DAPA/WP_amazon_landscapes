<?php get_header(); ?>
<div class="container">
  <div id="gridcontainer">
  <div class="row">
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
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
      </div>
      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?></a></h2>
    </div>
    <?php
      //Show the right hand side column
      elseif($counter == $grids) :
      ?>
    <div class="col-md-4"">
      <div class="postimage">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
      </div>
      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?></a></h2>
    </div>

    <?php
      $counter = 0;
      endif;
      ?>
    <?php
      $counter++;
      endwhile; 
      ?>
      </div>
      <div class="row">
<?php kriesi_pagination(); ?>
    </div>

      <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>