<?php

namespace App\Services\Category;

use Illuminate\Http\Request;
use App\Models\Category;

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
            'name' => 'required|max:30',
            'description' => 'max:500',
        ]);

        $input = $request->all();

        $category = Category::create($input);

        return $category;
    }
}
