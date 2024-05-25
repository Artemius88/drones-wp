

<?php get_header(); ?>

<?php if (is_page('/')): ?>
  <div style="margin: 100px;">Product</div>
<?php endif; ?>

<?php if (is_page('shop')): ?>
  <section class="hero-section">
    <?php [$url, $alt] = get_image_data(get_field('hero_image', 'option')); ?>
    <img
      class="hero-bg-image"
      src="<?php echo $url; ?>"
      alt="<?php wp_title(); ?>"
    >
    <div class="container">
      <h1><?php the_field('shop_page_title', 'options'); ?></h1>
    </div>
  </section>
<?php endif; ?>

<?php if (is_page('shop')): ?>
  <section class="products-section">
    <div class="container">
      <div class="filter-wrap"><?php echo do_shortcode('[wpf-filters id=1]') ?></div>
      <div class="products-wrap">
        <?php 
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post(); 
              the_content();
            }
          }
        ?>
      </div>
    </div>
  </section>
<?php else: ?>


<?php 
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); 
      the_content();
    }
  }
?>

<?php endif; ?>

<?php get_footer(); ?>