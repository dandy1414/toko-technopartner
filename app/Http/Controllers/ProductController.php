<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with('category', 'variant')->get();
        return view('product_index', [
            'products' => $products
        ]);

    }

    public function imageIndex()
    {
        $images = ProductImage::with('product')->get();

        return view('image_index', [
            'images' => $images
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

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $variants = Variant::all();

        return view('product_create', [
            'product' => $product,
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

    public function imageStore(ImageRequest $request)
    {

        $productImage = new ProductImage;
        $productImage->product_id = $request->product;
        $productImage->image_link = $request->image;
        $productImage->save();

        return redirect()->route('image.index');
    }

    public function imageCreate()
    {
        $products = Product::all();

        return view('image_create', [
            'products' => $products
        ]);
    }
}
