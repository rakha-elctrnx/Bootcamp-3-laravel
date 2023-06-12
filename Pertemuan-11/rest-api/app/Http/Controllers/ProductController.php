<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->json([
            "message"   => "Product Berhasil Diambil",
            "code"      =>  200,
            "data"      =>  $products
        ]);
    }

    public function show($id) {
        $products = Product::find($id);
        return response()->json([
            "message"   => "Product Berhasil Diambil",
            "code"      =>  200,
            "data"      =>  $products
        ]);
    }

    public function add(Request $request) {
        $cek = $request->validate([
            "nama"  => "required",
            "desc"  => "required",
            "harga" => "required|numeric",
        ]);

        $products = Product::create($cek);
        return response()->json([
            "message"   =>  "Product Berhasil Ditambah",
            "code"      =>  200,
            "harga"     =>  $products
        ]);
    }

    public function update(Request $request, $id) {
        $cek = $request->validate([
            "nama"  => "required",
            "desc"  => "required",
            "harga" => "required|numeric",
        ]);

        $products = Product::find($id);
        $products->update($cek);

        return response()->json([
            "message"   =>  "Product Berhasil Diupdate",
            "code"      =>  200,
            "harga"     =>  $products
        ]);
    }

    public function delete($id) {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            "message"   =>  "Product Berhasil Dihapus",
            "code"      =>  200
        ]);
    }
}
