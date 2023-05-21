<?php 
add_filter('woocommerce_product_get_price', 'discount_plugin_apply_discount', 10, 2);

function discount_plugin_apply_discount($price, $product)
{
    $discount_percentage = 10; // Change this to your desired discount percentage

    $discount = ($price * $discount_percentage) / 100;
    $discounted_price = $price - $discount;

    // Set the discounted price as the sale price
    $product->set_sale_price($discounted_price);

    return $discounted_price ;
}
