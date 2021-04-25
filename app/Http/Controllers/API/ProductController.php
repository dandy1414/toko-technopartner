<?php

namespace App\Http\Controllers\API;

use App\Models\Product;

use App\Http\Requests\API\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProduk(Request $request)
    {
        $products = Product::with('category', 'variant')->get();

        if($products){
            return ResponseFormatter::success($products, 'Data produk berhasil diambil');
        }else{
            return ResponseFormatter::error(null, 'Data produk tidak ditemukan', 404);
        }
    }

    public function createProduct(ProductRequest $request)
    {
        $products = new Product;
        $products->name = $request->input('name');
        $products->category_id = $request->input('categories_id');
        $products->colors = \json_encode($request->input('colors'));
        $products->description = $request->input('description');
        $products->save();

        $products->variant()->attach($request->variant);

        if($products){
            if($products){
                return ResponseFormatter::success($products, 'Data produk berhasil disimpan');
            }else{
                return ResponseFormatter::error(null, 'Data produk tidak berhasil', 500);
            }
        }
    }
}
