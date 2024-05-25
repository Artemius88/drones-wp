<?php
/*
* Template Name: Home page
*/
?>

<?php get_header(); ?>

<?php if( have_rows('slides') ): ?>
  <section class="hero-section">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php while ( have_rows('slides') ) : the_row(); ?>
          <?php 
            [$url, $alt] = get_image_data(get_sub_field('slide_image')); 
            $caption_text = get_sub_field('caption_optional');
          ?>
          <?php if(!empty(get_sub_field('link_optional'))): ?>
            <a href="<?php the_sub_field('link_optional'); ?>" class="swiper-slide">
              <?php echo generate_image_tag($url, $alt); ?>
              <?php echo generate_caption($caption_text, 'caption'); ?>
            </a>
          <?php else: ?>
            <div class="swiper-slide">
                <?php echo generate_image_tag($url, $alt); ?>
                <?php echo generate_caption($caption_text, 'caption'); ?>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></div>
    <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m560-240-56-58 142-142H160v-80h486L504-662l56-58 240 240-240 240Z"/></svg></div>
    </div>
  </section>
<?php endif; ?>

<section class="products-section">
  <div class="container">
    <h1><?php the_field('section_title'); ?></h1>
    <ul class="products-wrap">
      <?php
        $chosen_categories = get_field('filter_by_category');
        $category_ids = array();

        // Extract category IDs from the chosen categories
        if (!empty($chosen_categories)) {
          foreach ($chosen_categories as $category) {
            $category_ids[] = $category->term_id;
          }
        }

        $args = array(
          'post_type'      => 'product',
          'posts_per_page' => 12,
        );

        // Conditionally include tax_query if category IDs are not empty
        if (!empty($category_ids)) {
          $args['tax_query'] = array(
            array(
              'taxonomy' => 'product_cat',
              'field'    => 'term_id',
              'terms'    => $category_ids,
              'operator' => 'IN',
            ),
          );
        }

        $products_query = new WP_Query( $args );

        if ( $products_query->have_posts() ) :
          while ( $products_query->have_posts() ) :
            $products_query->the_post();
            wc_get_template_part( 'content', 'product' );
          endwhile;
          wp_reset_postdata();
        else :
          echo 'No products found';
        endif;
      ?>
    </ul>
    <a href="/shop" class="to-shop-link">
      <span>До магазину</span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24px" fill="#eee"><path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"/></svg>
    </a>
  </div>
</section>


<?php get_footer(); ?>
