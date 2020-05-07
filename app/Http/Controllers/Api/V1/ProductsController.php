<?php

namespace App\Http\Controllers\Api\V1;

use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Http\Requests\Admin\StoreProductsRequest;
use App\Http\Requests\Admin\UpdateProductsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class ProductsController extends Controller
{
    public function index()
    {
        

        return new ProductResource(Product::with(['categorie'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('product_view')) {
            return abort(401);
        }

        $product = Product::with(['categorie'])->findOrFail($id);

        return new ProductResource($product);
    }

    public function store(StoreProductsRequest $request)
    {
        if (Gate::denies('product_create')) {
            return abort(401);
        }

        $product = Product::create($request->all());
        
        if ($request->hasFile('image')) {
            $product->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductsRequest $request, $id)
    {
        if (Gate::denies('product_edit')) {
            return abort(401);
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());
        
        if (! $request->input('image') && $product->getFirstMedia('image')) {
            $product->getFirstMedia('image')->delete();
        }
        if ($request->hasFile('image')) {
            $product->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('product_delete')) {
            return abort(401);
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return response(null, 204);
    }
}
