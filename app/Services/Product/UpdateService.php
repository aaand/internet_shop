<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product;

class UpdateService
{
    /**
     * create category
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'integer',
            'name' => 'max:30|min:5',
            'description' => 'max:500',
            'price' => 'numeric',
            'count' => 'integer',
        ]);

        $product->update($request->all());

        return $product;
    }
}
