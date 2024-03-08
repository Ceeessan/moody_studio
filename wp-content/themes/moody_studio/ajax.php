<?php

function init_ajax(){
    add_action("wp_ajax_moody_studio_getbyajax", "moody_studio_getbyajax");
    add_action("wp_ajax_nopriv_moody_studio_getbyajax", "moody_studio_getbyajax");

    add_action("wp_enqueue_scripts", "moody_studio_enqueue_scripts");
}

add_action("init", "init_ajax");

function moody_studio_enqueue_scripts(){
    wp_enqueue_script("moody_studio_jquery", get_template_directory_uri() . "/resources/scripts/jquery.js" , array(), false, array());

    wp_enqueue_script("moody_studio_ajax", get_template_directory_uri() . "/resources/scripts/ajax.js", array("moody_studio_jquery"), false, array());

    wp_localize_script("moody_studio_ajax", "ajax_variables", array(
        "ajaxUrl" => admin_url("admin-ajax.php"), 
        "nonce" => wp_create_nonce("moody_studio_ajax_nonce")

    ));

}


add_action('wp_enqueue_scripts', 'add_custom_scripts');

function add_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/functions.js', array('jquery'), null, true);
    wp_localize_script('custom-scripts', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');



function load_more_products() {

        $page = $_POST['page'];
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10, 
        'paged' => $page
    );
    $products = new WP_Query($args);
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
    endif;
    wp_die(); 
}
