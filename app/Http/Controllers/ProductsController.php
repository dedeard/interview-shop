<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $query = Product::with('category');

        if (isset($search)) $query->where('name', 'like', "%$search%");
        if (isset($category)) $query->where('category_id', $category);

        $products = $query->orderBy('updated_at', 'desc')->paginate(12)->appends(['search' => $search, 'category' => $category]);

        $categories = Category::select('id', 'name')->get();

        return view('products.index', ['products' => $products, 'categories' => $categories]);
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('products.show', ['product' => $product]);
    }
}
