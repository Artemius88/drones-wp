<?php
/*
 * Create custom post type
 * */
// add_action('init', 'init_post_types');
// function init_post_types()
// {
//     register_post_type('products', array(
//         'label' => null,
//         'labels' => array(
//             'name' => 'Products', // основное название для типа записи
//             'singular_name' => 'Products', // название для одной записи этого типа
//             'add_new' => 'Add Product', // для добавления новой записи
//             'add_new_item' => 'Add', // заголовка у вновь создаваемой записи в админ-панели.
//             'edit_item' => 'Edit', // для редактирования типа записи
//             'new_item' => 'New Product', // текст новой записи
//             'view_item' => 'Watch', // для просмотра записи этого типа.
//             'search_items' => 'Search', // для поиска по этим типам записи
//             'not_found' => 'Not Found', // если в результате поиска ничего не было найдено
//             'not_found_in_trash' => 'Not found in basket', // если не было найдено в корзине
//             'parent_item_colon' => '', // для родителей (у древовидных типов)
//             'menu_name' => 'Products', // название меню
//         ),
//         'description' => '',
//         'public' => true,
//         'publicly_queryable' => null,
//         'exclude_from_search' => null,
//         'show_ui' => null,
//         'show_in_menu' => true, // показывать ли в меню адмнки
//         'show_in_admin_bar' => null, // по умолчанию значение show_in_menu
//         'show_in_nav_menus' => null,
//         'show_in_rest' => true, // добавить в REST API. C WP 4.7
//         'rest_base' => null, // $post_type. C WP 4.7
//         'menu_position' => 4,
//         'menu_icon' => null,
//         'hierarchical' => true,
//         'supports' => array('title', 'author', 'revisions'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
//         'taxonomies' => array(),
//         'has_archive' => true,
//         'rewrite' => array('slug' => 'product'),
//         'query_var' => true,
//         'menu_icon' => 'dashicons-analytics'
//     ));
// }
