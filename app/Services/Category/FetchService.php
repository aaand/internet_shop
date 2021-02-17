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
        $res = [];
        foreach ($categorys as $category) {
            $category_ar = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => substr($category->description, 0, 100),
                'product_count' => $category->products()->count(),
            ];
            array_push($res, $category_ar);
        }

        return $res;
    }
}
