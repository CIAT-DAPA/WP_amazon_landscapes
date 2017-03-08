<div class="container">
<div class="blog-post">

  <?php if(has_post_thumbnail()) : ?>
    <div class="news-thumb">
      <?php the_post_thumbnail(); ?>
    </div>



  <a href="<?php the_permalink(); ?>" class="blog-post-title">
    <?php if(is_single()) : ?>
      <?php the_title(); ?>
    <?php else : ?>
      
        <?php the_title(); ?>
      
    <?php endif; ?>
  </a>

  <p class="blog-post-meta">
    <h4><?php the_time('F j, Y g:i a'); ?> / by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"></a>
       <?php the_author(); ?>
     </a></h4>
  </p>

  <?php endif; ?>

  <?php if(is_single()) : ?>
    <?php the_content(); ?>
  <?php else : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>

  <?php if(is_single()) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</div><!-- /.blog-post -->
</div>