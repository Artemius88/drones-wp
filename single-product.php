<?php get_header(); ?>

<section class="pdp-section">
  <div class="container">
    <!-- <?php while ( have_posts() ) : the_post(); ?> -->
      <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <!-- <?php endwhile; ?> -->
  </div>
</section>

<?php get_footer(); ?>
