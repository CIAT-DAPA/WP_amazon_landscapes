<?php get_header(); ?>
<div class=container>
  <div class="row">
    <div>
      <br />
    </div>
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="col-md-12 title-single"> <small><?php the_time('F jS, Y') ?></small>
      <div>
        <h4>
        <?php the_title(); ?>
      </h4> </div>
      <div class="the_author">- Por
        <?php the_author_link(); ?> -</div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?> </div>
  <div class="row">
    <div class="col-md-8">
      <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
      <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
      <?php else : ?>
      <p>
        <?php __('No Posts Found'); ?> </p>
      <?php endif; ?>
      <?php if(is_single()) : ?>
      <div> <strong>
        Tags:<br />
          
        </strong>
        <?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name . ' '; 
  }
}
?>
      </div>
      <?php comments_template(); ?>
      <?php endif; ?> </div>
    <div class="col-md-1"> </div>
    <div class="col-md-3">
      <div>
        <br />
      </div>
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
  </div>
  <!-- /.blog-main -->
</div>
<?php get_footer(); ?>
