<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Product::all();
        return response([ 'products' => ProductResource::collection($products), 'message' => 'Dato entregado exitosamente'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        $product = new Product;

        $product->product_name = $data['product_name'];
        $product->product_type = $data['product_type'];
        $product->product_amount = $data['product_amount'];
        $product->product_price = $data['product_price'];
        $product->product_total = $data['product_amount'] * $data['product_price'];
        $product->product_liable = $data['product_liable'];
        $product->save();

        return response(['product' => new ProductResource($product), 'message' => 'Creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (is_null($product)) {
          return response(['message' => 'Producto no encontrado para mostrar.'], 404);
        }

        return response(['product' => new ProductResource($product), 'message' => 'Dato entregado exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (is_null($product)) {
         return response(['message' => 'Producto no encontrado para actualización.'], 404);
        }

        $product->product_name = $data['product_name'];
        $product->product_type = $data['product_type'];
        $product->product_amount = $data['product_amount'];
        $product->product_price = $data['product_price'];
        $product->product_total = $data['product_amount'] * $data['product_price'];
        $product->product_liable = $data['product_liable'];
        $product->update();


        return response(['product' => new ProductResource($product), 'message' => 'Actualizado exitosamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(['message' => 'Borrado']);
    }
}
