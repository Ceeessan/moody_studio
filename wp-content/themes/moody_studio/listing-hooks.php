<?php

function show_banner_shop(){

    $sale_banner_message = get_option('sale_banner_message');

    echo "<div class='member-banner'> 
    <h2 class='member-text'> Member Exclusive </h2>
    <p class='setting-banner-text'>" . esc_html($sale_banner_message) . "</p> 
    <p class='no-member-text'> Not a member? Join now to shop </p>
    </div>";

}

add_action( 'woocommerce_before_shop_loop', 'show_banner_shop', 10 );