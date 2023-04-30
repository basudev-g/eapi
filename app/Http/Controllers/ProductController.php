<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductCollection::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;

        $product->save();
        return response([
            "data" => new ProductResource($product),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request['detail'] = $request->description;
        unset($request['description']);
        $product->update($request->all());
        return response([
            "data" => new ProductResource($product),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
