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
function mytheme_add_star_rating() {
    global $product;
    $rating = $product->get_average_rating();
    $width = ( $rating / 5 ) * 100;

    echo "<div class='rating' >
    <div class='fill' style='width:" . $width . "%;'> </div>
    </div>";
}

add_action( 'woocommerce_after_shop_loop_item_title', 'mytheme_add_star_rating', 5 );