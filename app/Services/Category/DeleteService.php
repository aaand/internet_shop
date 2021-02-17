<?php

namespace App\Services\Category;

use Illuminate\Http\Request;
use App\Models\Category;

class DeleteService
{
    /**
     * create category
     * @param Request $request
     * @return mixed
     */
    public function make(Category $category)
    {
        $category->delete();
    }
}
