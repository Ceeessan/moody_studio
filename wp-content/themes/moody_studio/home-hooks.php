<?php

//skapar en div som wrappar runt titeln och priset i Top rating
function custom_open_price_title_wrapper() {
    echo '<div class="price-title-wrapper">';
}

function custom_close_price_title_wrapper() {
    echo '</div>';
}

add_action( 'woocommerce_shop_loop_item_title', 'custom_open_price_title_wrapper', 9 );

add_action( 'woocommerce_after_shop_loop_item_title', 'custom_close_price_title_wrapper', 10 );




// Lägg till stjärn-rating
/*
add_filter( 'woocommerce_product_get_rating_html', 'mytheme_custom_star_rating_html', 10, 3 );

function mytheme_custom_star_rating_html( $html, $rating, $count ) {
    $label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
    $stars_html = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';

    return $stars_html;
}
*/

function remove_product_rating() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
}
add_action( 'init', 'remove_product_rating' );
