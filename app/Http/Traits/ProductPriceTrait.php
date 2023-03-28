<?php

namespace App\Http\Traits;


trait ProductPriceTrait {

    public function product_price_after_discount($product){
        $discount_value = ($product->discount /100) * $product->price;
        $price_after_discount = $product->price - $discount_value;

        return $price_after_discount;
    }
}
