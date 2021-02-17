<?php

namespace App\Services\Category;

use Illuminate\Http\Request;
use App\Models\Category;

class UpdateService
{
    /**
     * create category
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'max:30',
            'description' => 'max:500',
        ]);

        $category->update($request->all());

        return $category;
    }
}
