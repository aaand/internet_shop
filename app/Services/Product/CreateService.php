<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product;

class CreateService
{
    /**
     * create category
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|max:30|min:5',
            'description' => 'max:500',
            'price' => 'required|numeric',
            'count' => 'integer',
        ]);

        $input = $request->all();

        $product = Product::create($input);

        return $product;
    }
}
