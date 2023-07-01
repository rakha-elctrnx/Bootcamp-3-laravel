<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index() {
        $product = Product::all();

        return response()->json([
            'message'   => 'Product Berhasil Diambil',
            'code'      => 200,
            'data'      => $product
        ]);
    }

    public function show($id) {
        $product = Product::find($id);

        return response()->json([
            'message'   => 'Product Berhasil Diambil',
            'code'      => 200,
            'data'      => $product
        ]);
    }

    public function store(Request $req) {
        $data = $req->validate([
            'nama'  => 'required',
            'desc'  => 'required',
            'harga'  => 'required',
            'foto'  => 'required|image'
        ]);

        if ($req->hasFile('foto')) {
            $img = $req->file('foto');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/'), $imgName);
            $data['foto'] = $imgName;
        }
        $product = Product::create($data);

        return response()->json([
            'message'   => 'Product Berhasil Ditambah',
            'code'      => 200,
            'data'      => $product
        ]);
    }

    public function update(Request $req, $id) {
        $data = $req->validate([
            'nama'  => 'required',
            'desc'  => 'required',
            'foto'  => 'required|image'
        ]);

        $product = Product::find($id);
        
        if ($req->hasFile('foto')) {
            if (!empty($product->foto)) {
                $imgPath = public_path('images/') . $product->foto;

                if (file_exists($imgPath)) {
                    unlink($imgPath);
                }
            }

            $img = $req->file('foto');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images' . $imgName));

            $data['foto'] = $imgName;
        }
        $product->update($data);

        return response()->json([
            'message'   => 'Product Berhasil Diedit',
            'code'      => 200,
            'data'      => $product
        ]);
    }

    public function delete($id) {
        $product = Product::find($id);

        if (!empty($product->foto)) {
            $imgPath = public_path('images/') . $product->foto;

            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }

        $product->delete();

        return response()->json([
            'message'   => 'Product Berhasil Dihapus',
            'code'      => 200,
        ]);
    }
}
