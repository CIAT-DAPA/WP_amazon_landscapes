<?php get_header(); ?>
<div class="container">
  <h2 class="blog-post-title">
    - <?php the_title(); ?> -
  </h2>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#donorpluspartners" aria-controls="donorpluspartners" role="tab" data-toggle="tab">Donante + Socios</a></li>
    <li role="presentation"><a href="#teamwork" aria-controls="teamwork" role="tab" data-toggle="tab">Equipo de Trabajo</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id=donorpluspartners>
      <?php include("donor-partners.php"); ?> 
    </div>
    <div role="tabpanel" class="tab-pane" id="teamwork">
      <?php include("team.php"); ?> 
    </div>
  </div>
  <?php include("donor-partners-footer.php"); ?> 
</div>
<?php get_footer(); ?>