<?php
function print_svg_ic($icon_id) {
  ?>
    <svg>
      <use xlink:href="<?php echo get_template_directory_uri() ?>/build/static/images/svg/symbol/sprite.svg#<?php echo $icon_id ?>"></use>
    </svg>
  <?php
}



function cut_p_tags($dirty_html) {
  $nice_html = $dirty_html;
  $nice_html = str_replace("<p>", "", $nice_html);
  $nice_html = str_replace("</p>", "", $nice_html);
  return $nice_html;
}


function print_store_card($post_id) {
  ?>
    <div class="stores-card">
        <?php $adress = get_field('adresa_tochky_prodazhu', $post_id); ?>
        
        <div class="stores-card__info">
            <span class="add-text green"><?php echo $adress['city'] ?></span>
            
            <span><?php echo $adress['address'] ?></span>
            <span class="stores-card__title"><?php echo get_the_title($post_id) ?></span>
            
              
            <?php if( have_rows('nomera_telefoniv', $post_id) ): ?>
                <div class="stores-card__numbers">
                <?php while ( have_rows('nomera_telefoniv', $post_id) ) : the_row();
                    $num = get_sub_field('telefon'); ?>
                    <a href="tel:<?php echo $num ?>"><?php echo $num ?></a>
                <?php endwhile; ?> 
                </div>
            <?php endif; ?> 
            
        </div>
        <div class="stores-card__logo">
            <?php $logo = get_field('logotyp_tochky', $post_id);
            if ($logo): ?>
                <img src="<?php echo $logo['sizes']['medium_large'] ?>" alt="">
            <?php else: ?>
                <span>logo</span>
            <?php endif; ?>
        </div>
    </div>
  <?php
}

function isMobile() {
  $detect = new Mobile_Detect;
  return $detect->isMobile(); 
}
function isTablet() {
  $detect = new Mobile_Detect;
  return $detect->isTablet(); 
}
function isDesktop() {
  return (!isTablet() && !isMobile());
}

function get_image_data($image_field) {
  $url = '';
  $alt = 'drones';
  if (!empty($image_field)) {
      ['url' => $url, 'alt' => $alt] = $image_field;
  }
  return [$url, $alt];
}

function generate_image_tag($image_url, $alt = null, $class = null) {
  if ($image_url) {
    return '<img src="' . $image_url . '" alt="' . $alt . '" class="' . $class . '">';
  }
}

function generate_caption($caption_text, $class = null) {
  if ($caption_text) {
    return '<div class="' . $class . '">' . $caption_text . '</div>';
  }
}


function custom_render_cart_icon() {
  ?>
  <div class="cart-icon">
      <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'woocommerce'); ?>">
          <?php
          // Get the item count
          $item_count = WC()->cart->get_cart_contents_count();
          ?>
          <svg xmlns="http://www.w3.org/2000/svg" fill="#eee" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg>
          <span class="count"><?php echo esc_html($item_count); ?></span>
      </a>
  </div>
  <?php
}

add_action('woocommerce_widget_shopping_cart_button_view', 'custom_render_cart_icon');