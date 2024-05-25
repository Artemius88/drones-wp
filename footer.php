</div>
</main>

<?php wp_footer(); ?>
<footer class="footer" id="footer">
  <div class="container">
    <div class="footer-top">
      <a href="/"  class="footer-logo-link">
          <?php [$url, $alt] = get_image_data(get_field('logo_image', 'options')); ?>
          <img
            src="<?php echo $url; ?>"
            alt="<?php wp_title(); ?>"
          >
      </a>

        <div class="footer-nav">
          <?php if( have_rows('navigation_menu', 'options') ): ?>
            <ul>
              <?php while ( have_rows('navigation_menu', 'options') ) : the_row(); ?>
                <li>
                  <a href="<?php the_sub_field('link_url', 'options'); ?>"><?php the_sub_field('link_title', 'options'); ?></a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>

        <div class="footer-contacts">
          <a class="footer-link" href="mailto:<?php the_field('contact_email', 'options'); ?>">
            <?php the_field('contact_email', 'options'); ?>
          </a>
          <?php if( have_rows('contact_phones', 'options') ): ?>
            <?php while ( have_rows('contact_phones', 'options') ) : the_row(); ?>
              <a class="footer-link" href="tel:<?php the_sub_field('number', 'options'); ?>">
                <?php the_sub_field('number', 'options'); ?>
              </a>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php if( have_rows('icons_links', 'options') ): ?>
            <div class="contact-icons">
              <?php while ( have_rows('icons_links', 'options') ) : the_row(); ?>
                <a href="<?php the_sub_field('icon_link_url', 'options'); ?>">
                  <?php [$url, $alt] = get_image_data(get_sub_field('link_icon', 'options')); ?>
                  <img
                    src="<?php echo $url; ?>"
                    alt="<?php wp_title(); ?>"
                  >
                </a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>

    </div>
    <div class="footer-bottom">
      <?php
        $site_title = get_bloginfo('name');
        echo '© 2024 ' . $site_title;
      ?>
    </div>
  </div>

  <?php
    if (is_page('shop')) {
      echo '<script src="' . esc_url(get_template_directory_uri() . '/build/static/js/pages/page-shop.js') . '"></script>';
    }
    if (is_page('cart')) {
      echo '<script src="' . esc_url(get_template_directory_uri() . '/build/static/js/pages/page-cart.js') . '"></script>';
    }
  ?>
</footer>
</body>
</html>