<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CoverHelper;
use App\Helpers\VideoHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $query = Product::query();
        if (isset($search)) $query->where('name', 'like', "%$search%");
        $products = $query->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $search]);

        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0|not_in:0|max:99999',
            'description' => 'required|max:3200',
        ]);
        $data['category_id'] = $data['category'];
        $data['price'] = $data['price'] * 1000;
        $product = Product::create($data);

        return redirect()->route('admin.products.edit', $product->id)->withSuccess('Product has created');
    }

    public function edit(Request $request, string $id)
    {
        $tab = $request->input('tab') ?? 'basic';
        abort_unless(in_array($tab, ['basic', 'cover', 'video']), 404);

        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['product' => $product, 'tab' => $tab]);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0|not_in:0|max:99999',
            'description' => 'required|max:3200',
        ]);
        $data['category_id'] = $data['category'];
        $data['price'] = $data['price'] * 1000;
        $product->update($data);

        return redirect()->back()->withSuccess('Product has updated');
    }

    public function updateCover(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'image' => 'required|image|max:' . env('MAX_IMAGE_SIZES', '3000')
        ]);

        $name = CoverHelper::generate($data['image'], $product->cover);
        $product->update(['cover' => $name]);

        return response()->json($product->cover_url);
    }

    public function updateVideo(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,fly|max:' . env('MAX_VIDEO_SIZES', '5000'),
        ]);
        $name = VideoHelper::upload($data['video'], $product->video);
        $product->update(['video' => $name]);

        return response()->json([
            'video_url' => $product->video_url,
        ]);
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->cover) CoverHelper::destroy($product->cover);
        if ($product->video) VideoHelper::destroy($product->video);
        $product->delete();
        return redirect()->route('admin.products.index')->withSuccess('Product has deleted');
    }
}
