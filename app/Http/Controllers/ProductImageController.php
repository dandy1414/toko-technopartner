<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = ProductImage::with('product')->get();

        return view('image_index', [
            'images' => $images
        ]);
    }


    public function create()
    {
        $products = Product::all();

        return view('image_create', [
            'products' => $products
        ]);
    }

    public function store(ImageRequest $request)
    {
        ProductImage::create([
            'product_id' => $request->product,
            'image_link' => $request->image
        ]);

        return redirect()->route('image.index');
    }
}
