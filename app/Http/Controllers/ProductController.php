<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with('category', 'variant')->get();
        $categories = Category::all();

        foreach($products as $product){
            $product->colors = json_decode($product->colors);
        }

        return view('product_index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $variants = Variant::all();

        return view('product_create', [
            'categories' => $categories,
            'variants' => $variants
        ]);
    }

    public function store(ProductRequest $request)
    {
        $products = new Product;
        $products->name = $request->name;
        $products->category_id = $request->categories_id;
        $products->colors = \json_encode($request->colors);
        $products->description = $request->description;
        $products->save();


        $products->variant()->attach($request->variant);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $variants = Variant::all();

        return view('product_edit', [
            'product' => $product,
            'categories' => $categories,
            'variants' => $variants
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->categories_id;
        $product->colors = \json_encode($request->colors);
        $product->description = $request->description;
        $product->save();

        $product->variant()->attach($request->variant);

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        ProductImage::where('product_id', $id)->delete();

        return redirect()->route('product.index');
    }
}
