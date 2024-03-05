<?php

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

//Knapp för listing
function load_products_button(){

    if (is_shop() || is_product_category() || is_product_tag()) { 
    echo '<div class=button-container>';
    echo '<button class="load-products-button"> LOAD MORE PRODUCTS </button>';
    echo '</div>';
    }
}

add_action('woocommerce_after_main_content', 'load_products_button');



//Fixa färg-pluppar för variablerna
function custom_display_product_colors() {
    global $product;

    
    if ( $product->is_type( 'variable' ) && taxonomy_exists( 'pa_color' ) ) {
        
        $terms = wc_get_product_terms( $product->get_id(), 'pa_color', array( 'fields' => 'names' ) );

        if ( ! empty( $terms ) ) {
            $product_id = $product->get_id();

            foreach ( $terms as $color ) {
                // Skapa unikt id baserat på produktens id och attributets namn
                $id = 'color_' . $product_id . '_' . sanitize_title( $color );
                
                echo '<div class="attribute-div">';
                echo '<label for="' . esc_attr( $id ) . '" class="attribute-color">';
                echo '<input type="radio" id="' . esc_attr( $id ) . '" name="product_color" value="' . esc_attr( $color ) . '">';
                
                echo '</label><br>';
                echo '</div>';
            }
        }
    }
}
add_action( 'woocommerce_shop_loop_item_title', 'custom_display_product_colors', 10 );



//Skapa en hook som lägger till filter-rad under product-title
function filter_sort_line(){

    echo '<div class="filter-sort-container"> 
    <div class= "filter-sort"> 
    <img class="filter-icon" src="' . esc_url( get_template_directory_uri() ) . '/resources/images/filter.svg">
    <p class="filter-text"> FILTER & SORT</p>
    </div>

    <div class="model-product-container">
    <p class="models-text">Models</p>
    <p>Products</p>
     </div>

    </div>';
}

add_action('woocommerce_archive_description', 'filter_sort_line');




//För att få fram lazy-load?
function enqueue_ajax_script() {
    if (is_page('products-page')) {
        wp_enqueue_script('ajax-script', get_template_directory_uri() . '/resources/scripts/ajax.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_script');
