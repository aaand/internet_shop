<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product;

class FetchService
{
    /**
     * fetch category
     * @return mixed
     */
    public function make($volume, $page = null)
    {
        $products = Product::offset($page)->limit($volume)->select('id', 'name', 'category_id', 'price', 'count')->get();
        $res = [];
        foreach ($products as $product) {
            $product_ar = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'count' => $product->count,
                'category' => $product->category->name,
            ];

            array_push($res, $product_ar);
        }

        return $res;
    }
}
