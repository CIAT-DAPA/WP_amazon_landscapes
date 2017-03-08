<div>
  <?php if(is_single()) : ?>
    <?php the_content(); ?>
  <?php else : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>

</div><!-- /.blog-post -->
