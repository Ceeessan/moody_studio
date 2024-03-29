<?php

//Om konstanten "absolute path" är definierad, avbryt allt. 
if(!defined('ABSPATH')){
    exit;
}

require_once("vite.php");

require_once("listing-hooks.php");

require_once("checkout-hooks.php");

require_once("product-hooks.php");

require_once("home-hooks.php");

require_once("cart-hooks.php");

require_once("init.php");

require_once("settings.php");

require_once("shortcodes.php");

require_once("ajax.php");


//Initialize theme
require_once(get_template_directory() . "/init.php");


function moody_studio_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'moody_studio_add_woocommerce_support' );



