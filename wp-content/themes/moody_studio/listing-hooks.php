<?php

//Detta är för att skapa widgets i panelen. Så att man ska kunna lägga till kategorier i filtrerings-området.
function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidofält', 'mytheme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widget-område på sidofältet', 'mytheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );
//////////////////////////////////////


// Ta bort breadcrumbs från WooCommerce
function remove_woocommerce_breadcrumb() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action('woocommerce_before_main_content', 'remove_woocommerce_breadcrumb', 1);


//Flytta breadcrumbs
function move_breadcrumbs() {
    echo '<div id="breadcrumbs">';
    woocommerce_breadcrumb();
    echo '</div>';
}
add_action('woocommerce_before_main_content', 'move_breadcrumbs',9);


//Skapar upp Banner för Shop-page.
function show_banner_shop(){

    if (is_shop() || is_product_category()) {
        $display_sale_banner = get_option('display_sale_banner');

    if($display_sale_banner){
        $sale_banner_message = get_option('sale_banner_message');

    echo "<div class='member-banner'> 
    <h2 class='member-text'> Member Exclusive </h2>
    <p class='setting-banner-text'>" . esc_html($sale_banner_message) . "</p> 
    <p class='no-member-text'> Not a member? Join now to shop </p>
    </div>";
    } 
}
}

add_action( 'woocommerce_before_main_content', 'show_banner_shop', 10 );


//Lade till texten under titeln, med olika texter beroende på vilken sida som man besöker.
function add_text_under_title(){

    if(is_product_category('bedroom')){
        echo "<p class='title-mini-text'> Its easy to transform your bedroom interior with our great selection of acessories. </p>";
    } 
    elseif(is_product_category('bathroom')){
        echo "<p class='title-mini-text'> Its easy to transform your bathroom interior with our great selection of acessories. </p>";
    }
    elseif(is_product_category('livingroom')){
        echo "<p class='title-mini-text'> Its easy to transform your livingroom interior with our great selection of acessories. </p>";
    }
    elseif(is_product_category('outdoor')){
        echo "<p class='title-mini-text'> Its easy to transform your outdoor interior with our great selection of acessories. </p>";
    }
    elseif(is_product_category('store') || is_shop() ){
        echo "<p class='title-mini-text'> Its easy to transform your home interior with our great selection of acessories. </p>";
    }
}

add_action('woocommerce_archive_description', 'add_text_under_title');


function load_products_button(){

    echo '<div class=button-container>';
    echo '<button class="load-products-button"> LOAD MORE PRODUCTS </button>';
    echo '</div>';
}

add_action('woocommerce_after_main_content', 'load_products_button');