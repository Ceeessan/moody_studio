<?php

// require_once("ajax.php");

function moody_studio_enqueue(){
    // Här länkar vi till CSS och JS.
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("mystyle", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");

}

add_action('wp_enqueue_scripts', 'moody_studio_enqueue');




function moody_studio_init()
{
    // add theme support
    add_theme_support('post-thumbnails');

    // register MENU
    $menu = array(
        'main_menu' => 'main_menu',
        'primary_menu' => 'primary_menu',
        'footer_urban' => 'footer_urban',
        'footer_shopping' => 'footer_shopping',
        'footer_more' => 'footer_more',
        'footer_blog' => 'footer_blog'
    );
    register_nav_menus($menu);
}
add_action("after_setup_theme", "moody_studio_init");
