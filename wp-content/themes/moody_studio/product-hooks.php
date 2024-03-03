<?php
//Tar bort kategorier
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//Tar bort "Additional information"-taben
add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 9999 );
  
function remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

//Dölj titeln "Description"
add_filter( 'woocommerce_product_description_heading', '__return_null' );

add_filter('woocommerce_product_related_products_heading',function(){

    return 'Also You May Like';

 });


 add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
 function woocommerce_custom_single_add_to_cart_text() {
     return __( 'ADD TO SHOPPING BAG', 'woocommerce' );
    }

//Skapar en div som wrappas runt bilderna och "entry-summary"
function custom_single_product_div_open() {
    echo '<div class="single-product-div">';
}
add_action( 'woocommerce_before_single_product_summary', 'custom_single_product_div_open', 5 );

function custom_single_product_div_close() {
    echo '</div>';
}
add_action( 'woocommerce_after_single_product_summary', 'custom_single_product_div_close', 5 );

//Tar bort "Clear" som alternativ när man valt en attribut
add_filter( 'woocommerce_reset_variations_link', '__return_empty_string', 9999 );

//Select an option > Select Size/Select Color
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'custom_text', 10, 2);

function custom_text($html, $args) { 
    if ($args['attribute'] == 'Size') {
        $html = str_replace('Choose an option', __( 'Select Size', 'custom_text' ), $html); 
    }

    if ($args['attribute'] == 'pa_color') {
        $html = str_replace('Choose an option', __( 'Select Color', 'custom_text' ), $html); 
    }
    return $html; 
}


//Tar bort kvantitet från produktsidan
function quantity_wp_head() {
   
    if ( is_product() ) {
        ?>
    <style type="text/css">.quantity, .buttons_added { width:0; height:0; display: none; visibility: hidden; }</style>
    <?php
        }
    }
        add_action( 'wp_head', 'quantity_wp_head' );


//Lägsta priset visas från "price-range"
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
function custom_variation_price( $price, $product ) {
     $price = '';
     $price .= woocommerce_price($product->get_price());
     return $price;
}

//Priset ändras beroende på val av attribut
add_action( 'woocommerce_variable_add_to_cart', 'update_price_with_variation_price' );
  
function update_price_with_variation_price() {
   global $product;
   $price = $product->get_price_html();
   wc_enqueue_js( "     
      $(document).on('found_variation', 'form.cart', function( event, variation ) {   
         if(variation.price_html) $('.summary > p.price').html(variation.price_html);
         $('.woocommerce-variation-price').hide();
      });
      $(document).on('hide_variation', 'form.cart', function( event, variation ) {   
         $('.summary > p.price').html('" . $price . "');
      });
   " );
}

//Ger bilder i Product Gallery en bestämd storlek
function custom_gallery_image_size($size) {
    return array(
        'width' => 381,
        'height' => 572,
        'crop' => 1,
    );
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', 'custom_gallery_image_size');



//Lägger till "Not available in stores" under short description
add_action( 'woocommerce_single_product_summary', 'add_custom_text_with_icon_below_short_description', 25 );

function add_custom_text_with_icon_below_short_description() {
    if ( is_product() ) {
        $icon_url = esc_url( get_template_directory_uri() ) . '/resources/images/pin.svg';

        echo '<p class="not-available"><img src="' . $icon_url . '"> <span>Not available in stores</span></p>';
    }
}


