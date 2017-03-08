<!-- Carousel
  ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php query_posts('showposts=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="item active">
        <img src=<?php the_post_thumbnail_url(); ?> class="first-slide" alt=<?php the_title(); ?>>
        <div class="container">
          <div class="carousel-caption col-md-12">
            <div class="container" id="caption_content">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
              <p><a class="btn btn-lg btn-primary" href="<?php the_permalink(); ?>" role="button">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile;?>

    <?php query_posts('showposts=3&offset=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="item">
        <img class="first-slide" src=<?php the_post_thumbnail_url(); ?> alt="<?php the_title(); ?>">
        <div class="container">
          <div class="carousel-caption col-md-12">
            <div class="container" id="caption_content">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
              <p><a class="btn btn-lg btn-primary" href="<?php the_permalink(); ?>" role="button">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile;?>

  </div>

</div>
<!-- /.carousel -->
