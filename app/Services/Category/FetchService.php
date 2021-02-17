<?php

namespace App\Services\Category;

use Illuminate\Http\Request;
use App\Models\Category;

class FetchService
{
    /**
     * fetch category
     * @return mixed
     */
    public function make()
    {
        $categorys = Category::all();
        foreach ($categorys as $category) {
            $category->description = substr($category->description, 0, 100);
            $category->product_count = $category->products()->count();
        }

        return $categorys;
    }
}
