<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
	<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <?php
    if (is_page('shop')) {
      echo '<link rel="stylesheet" href="' . esc_url(get_template_directory_uri() . '/build/static/css/pages/shop.css') . '" />';
    }
    if (is_page('cart')) {
      echo '<link rel="stylesheet" href="' . esc_url(get_template_directory_uri() . '/build/static/css/pages/cart.css') . '" />';
    }
    if (is_page('order-received')) {
      echo '<link rel="stylesheet" href="' . esc_url(get_template_directory_uri() . '/build/static/css/pages/order-received.css') . '" />';
    }
    if (is_page('checkout')) {
      echo '<link rel="stylesheet" href="' . esc_url(get_template_directory_uri() . '/build/static/css/pages/checkout.css') . '" />';
    }
  ?>
  
  <title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
  
</head>

<body>


	<main <?php body_class(); ?>>

    <header class="header" id="header">

      <div class="container">

        <div class="top-header-wrap">
          <a href="/"  class="top-logo-link">
              <?php [$url, $alt] = get_image_data(get_field('logo_image', 'options')); ?>
              <img
                src="<?php echo $url; ?>"
                alt="<?php wp_title(); ?>"
              >
          </a>
        </div>

        <div class="bottom-header-wrap">
          <nav>
            <?php if( have_rows('navigation_menu', 'options') ): ?>
              <ul>
                <?php 
                  $total_items = count(get_field('navigation_menu', 'options'));
                  $current_index = 0;
                ?>
                <?php while ( have_rows('navigation_menu', 'options') ) : the_row(); ?>
                  <li>
                    <a href="<?php the_sub_field('link_url', 'options'); ?>"><?php the_sub_field('link_title', 'options'); ?></a>
                  </li>
                    <?php if (++$current_index !== $total_items): ?>
                      <div class="nav-divider"></div>
                    <?php endif; ?>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </nav>

          <a href="/" class="bottom-logo-link">
            <?php [$url, $alt] = get_image_data(get_field('logo_image', 'options')); ?>
            <img
              src="<?php echo $url; ?>"
              alt="<?php wp_title(); ?>"
            >
          </a>

          <div class="menu-toggler" id="menu-toggler">
            <svg class="burger" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#eee">
              <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" fill="#eee"/>
            </svg>
            <svg class="close-btn" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="#eee">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" fill="#eee"/>
            </svg>
          </div>
        </div>

      </div>
      <?php custom_render_cart_icon(); ?>
    </header>

    <div class="nav-sidebar" id="nav-sidebar">
      <nav>
        <?php if( have_rows('navigation_menu', 'options') ): ?>
          <ul>
            <?php while ( have_rows('navigation_menu', 'options') ) : the_row(); ?>
              <li>
                <a href="<?php the_sub_field('link_url', 'options'); ?>"><?php the_sub_field('link_title', 'options'); ?></a>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </nav>
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

		<div class='main-wrap in-full-header' id="main-wrap">