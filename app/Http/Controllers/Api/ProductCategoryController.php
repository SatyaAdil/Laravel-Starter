<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'List Data Product Category',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $category = new Categories;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/categories', $imageName, 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category successfully created',
            'data' => $category
        ], 201);
    }

    public function show($id) 
    { 
        $category = Categories::findOrFail($id); 
    } 
}
