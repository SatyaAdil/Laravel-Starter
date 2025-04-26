<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    // fungsi menampilkan halaman homepage
    public function index()
    {
        $categories = Categories::all();


        $title = "homepage";
        return view('web.homepage', ['title' => $title, 'categories' => $categories]);
    }

    public function products()
    {
        return view('web.products');
    }

    public function producT($slug)
    {

        $category = Categories::find($slug);
        return view('web.product', ['slug' => $slug]);
    }

    public function categories()
    {
        return view('web.categories');
    }
    public function category($slug)
    {
        return view('web.category_by_slug', ['slug' => $slug]);
    }
    public function cart()
    {
        return view('web.cart');
    }

    public function checkout()
    {
        return view('web.checkout');
    }
}
