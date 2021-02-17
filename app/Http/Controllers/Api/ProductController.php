<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Product\CreateService;
use App\Services\Product\UpdateService;
use App\Services\Product\DeleteService;
use App\Services\Product\FetchService;
use App\Services\Product\ShowService;
use App\Http\Controllers\Api\BaseController as BaseController;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FetchService $service)
    {
        $page = 0;
        if ($request->input('page')) {
            $page = $request->input('page');
        }
        $products = $service->make(10, $page);

        return $this->sendResponse($products, 'Product retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateService $service)
    {
        $product = $service->make($request);

        return $this->sendResponse($product, 'Product created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, UpdateService $service)
    {
        $service->make($request, $product);

        return $this->sendResponse($product, 'Product updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, ShowService $service)
    {
        $res = $service->make($product);

        return $this->sendResponse($res, 'Product retrieved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, DeleteService $service)
    {
        $service->make($product);

        return $this->sendResponse($product, 'Product deleted successfully.');
    }
}
