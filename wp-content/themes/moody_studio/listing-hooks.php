<?php

//Tar bort "Shop"-titeln
add_filter( 'woocommerce_page_title', 'remove_shop_page_title' );
function remove_shop_page_title( $page_title ) {
    if ( is_shop() ) {
        return '';
    }
    return $page_title;
}

//Skapar upp Banner för Shop-page.
function show_banner_shop(){

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

add_action( 'woocommerce_before_shop_loop', 'show_banner_shop', 10 );