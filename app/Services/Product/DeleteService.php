<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Models\Product;

class DeleteService
{
    /**
     * create category
     * @param Request $request
     * @return mixed
     */
    public function make(Product $product)
    {
        $product->delete();
    }
}
