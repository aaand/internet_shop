<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product;

class ShowService
{
    /**
     * show product
     * @param Product $product
     * @return mixed
     */
    public function make(Product $product)
    {
        $res = [
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'count' => $product->count,
            'history' => $product->historys,
        ];
        return $res;
    }
}
