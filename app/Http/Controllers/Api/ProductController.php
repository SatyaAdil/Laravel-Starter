<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'List Data Product',
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255', 
            'slug' => 'required|string|max:255|unique:products,slug', 
            'sku' => 'required|string|unique:products,sku', 
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
            'product_category_id' => 'nullable|exists:product_categories,id', 
            'description' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->description = $request->description;
        $product->is_active = $request->has('is_active') ? $request->is_active : true;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Product Created Successfully',
            'data' => new ProductResource($product)
        ], 201);
    }

    public function show($id) 
    { 
        $product = Product::findOrFail($id);
        return new ProductResource($product, 200, 'Product Details');  
    } 

}
