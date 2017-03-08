<?php get_header(); ?>
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


<div class="container" id="container_title">
  <h1 class="main-title">
    <?php bloginfo('name'); ?> 
  </h1>
  <p></p>
  <a href="" class="btn btn-default btn-lg">Conoce más</a> 
</div>
<div id="container_definition">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>El <strong>HolaProyecto Paisajes Sostenibles para la Amazonía (SAL)</strong> surge como una estrategia para complementar iniciativas que Perú y Colombia vienen adelantando para reducir la deforestación, incrementar la captura de carbono y fortalecer la capacidad de adaptación al cambio climático a nivel local y nacional.<br/><br/> A través de un enfoque multidisciplinario, el proyecto pretende reducir la deforestación, incrementar la captura de carbono y fortalecer la capacidad de adaptación al cambio climático entre agricultores y autoridades ambientales de Colombia y Perú.</p>
      </div>
      <div class="col-md-6">
        <p>Con el fin de que estos países cumplan la meta de reducir las pérdidas netas de sus bosques naturales a cero, así como diseñar planes nacionales de acción para mitigar y adaptarse al cambio climático, los investigadores del proyecto SAL trabajan para identificar sistemas agrícolas capaces de aumentar sumideros de carbono, proteger bosques, incrementar la capacidad de adaptación de las comunidades locales al cambio climático y mejorar la productividad agrícola.</p>
      </div>
    </div>
  </div>
</div>
<section class="boxes">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <p class="tag-black">PUBLICACIÓN</p>
        <div class="cgspace">
          <?php include("query_cgspace.php");?>
          <?php query_cgspace(1); ?> 
        </div>
      </div>
      <div class="col-md-4">
        <p class="tag-black">NOTICIAS</p>
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
            <?php the_post_thumbnail(); ?> 
          </div>
          <?php else : ?>
        <a img class="post-thumb">
        <?php if ( function_exists( 'get_post_image' ) ) get_post_image( 0, true ); ?> </a>
        <?php endif; ?>
        <?php the_title(); ?> </a>
        <?php endwhile; ?>
        <?php else : ?>
        <?php __('No Posts Found'); ?>
        <?php endif; ?> 
      </div>
      <div class="col-md-4">
        <p class="tag-black">FOTO</p>
        <?php include("query_flickr.php"); ?>
        <?php query_flickr(1); ?> 
      </div>
    </div>
  </div>
</section>
<div class="container">
  <?php include("donor-partners-footer.php"); ?> 
</div>
<footer class="blog-footer" id="test">
  <?php get_footer(); ?> 
</footer>
</body>
</html>
