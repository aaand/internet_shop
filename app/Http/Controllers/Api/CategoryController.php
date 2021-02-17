<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\Category\CreateService;
use App\Services\Category\UpdateService;
use App\Services\Category\DeleteService;
use App\Services\Category\FetchService;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FetchService $service)
    {
        $categorys = $service->make();

        return $this->sendResponse($categorys, 'Category retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateService $service)
    {
        $category = $service->make($request);

        return $this->sendResponse($category, 'Category created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, UpdateService $service)
    {
        $service->make($request, $category);

        return $this->sendResponse($category, 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, DeleteService $service)
    {
        $service->make($category);

        return $this->sendResponse($category, 'Category deleted successfully.');
    }
}
