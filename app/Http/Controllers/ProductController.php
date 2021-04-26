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
        $request_colors = \json_encode($request->colors);

        $products = Product::create([
            'name' => $request->name,
            'category_id' => $request->categories_id,
            'colors' => $request_colors,
            'description' => $request->description
        ]);

        $products->variant()->attach($request->variant);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $variants = Variant::all();

        $product->colors = json_decode($product->colors);

        return view('product_edit', [
            'product' => $product,
            'categories' => $categories,
            'variants' => $variants
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $request_colors = \json_encode($request->colors);

        // $product = Product::findOrfail($id)->update([
        //     'name' => $request->name,
        //     'category_id' => $request->categories_id,
        //     'colors' => $request_colors,
        //     'description' => $request->description
        // ])->variant()->sync($request->variant);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->category_id = $request->categories_id;
        $product->colors = \json_encode($request->colors);
        $product->description = $request->description;
        $product->save();

        $product->variant()->sync($request->variant);
        
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach($product as $prod){
            $variant_ids = $prod->variant->id;
        }

        $product->variant()->detach($variant_ids);
        $product->category()->detach($product->category->id);
        $product = Product::delete($id);

        return redirect()->route('product.index');
    }
}
