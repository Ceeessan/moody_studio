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






