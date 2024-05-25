<?php
/*
* Template Name: FAQ page
*/
?>

<?php get_header(); ?>

<section class="hero-section">
  <?php [$url, $alt] = get_image_data(get_field('hero_background_image')); ?>
  <img
    class="hero-bg-image"
    src="<?php echo $url; ?>"
    alt="<?php wp_title(); ?>"
  >
  <div class="container">
    <h1><?php the_field('page_title'); ?></h1>
  </div>
</section>

<section class="section-faq">
  <div class="container">
    <?php if( have_rows('faqs') ): ?>
      <div class="faqs-wrap">
        <?php while ( have_rows('faqs') ) : the_row(); ?>
          <div class="single-faq-wrap">
            <div class="question">
              <span>
                <?php the_sub_field('question'); ?>
              </span>
              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/></svg>
            </div>
            <div class="answer"><?php the_sub_field('answer'); ?></div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>