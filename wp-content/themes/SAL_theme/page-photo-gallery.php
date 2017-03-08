<?php get_header(); ?>
<div class="container">
  <div class="row" class="cgspace">
    <div class="col-sm-12 blog-main">
      <h2 class="blog-post-title">
        - <?php the_title(); ?> -
      </h2>
      <?php include("query_flickr.php"); ?>
      <div id="gallery" style="display:none;">
        <?php query_flickr(0); ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  jQuery("#gallery").unitegallery({
  tile_width: 266,            //tile width
  tile_height: 145,           //tile height
  tile_enable_textpanel:true,
  tile_textpanel_title_text_align: "center",
  tile_textpanel_title_font_size:12,
  tile_border_width:0,
  grid_num_rows:6,
  theme_navigation_type: "bullets",  
  theme_space_between_arrows: 50,
  });;
</script>
<?php get_footer(); ?>