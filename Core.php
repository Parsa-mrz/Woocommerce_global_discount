<?php

class DiscountCore
{
    public function __construct()
    {
        add_filter('woocommerce_product_get_price', [$this,'AddDiscount'], 10, 2);
    }
    public function AddDiscount($price, $product)
    {
        $discount_percentage = get_option('discount_percentage'); // Change this to your desired discount percentage

        $discount = ($price * $discount_percentage) / 100;
        $discounted_price = $price - $discount;

        // Set the discounted price as the sale price
        $product->set_sale_price($discounted_price);

        return $discounted_price;
    }
}
new DiscountCore();