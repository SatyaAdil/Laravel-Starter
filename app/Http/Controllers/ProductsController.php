<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get(); // Relasi ke kategori
        return view('dashboard.products.view', compact('products'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product = new Products();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/products', $imageName, 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'description' => 'nullable|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $id,
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product->fill($request->only(['name', 'slug', 'description', 'sku', 'price', 'stock', 'product_category_id']));
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs(
                'uploads/products',
                $imageName,
                'public'
            );
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
