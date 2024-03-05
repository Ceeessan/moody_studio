<?php

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

function load_more_products() {
    $page = $_POST['page'];

    // Simulerar att hämta produkter från en databas baserat på sidan
    $products = array();

    // Antalet produkter att hämta per sida
    $products_per_page = 10;

    // Startposition för produkter baserat på sidan
    $start_index = ($page - 1) * $products_per_page;

    // Generera exempelprodukter (ersätt med din egen logik för att hämta produkter från databasen)
    for ($i = 1; $i <= $products_per_page; $i++) {
        $product_id = $start_index + $i;
        $products[] = array(
            'id' => $product_id,
            'name' => 'Product ' . $product_id,
            'price' => rand(10, 100),
            'description' => 'Description for Product ' . $product_id,
            // Lägg till fler attribut om det behövs
        );
    }

    // Returnera produktdata som JSON
    wp_send_json($products);
    wp_die();
}
