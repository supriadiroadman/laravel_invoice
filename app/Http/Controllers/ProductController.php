<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = $this->validate($request, [
            'title'       => 'required|string|max:100',
            'description' => 'required|string',
            'price'       => 'required|integer',
            'stock'       => 'required|integer'
        ]);

        try {
            $product = Product::create($product);
            return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Berhasil disimpan']);
        } catch (Exception $e) {
            return redirect('/product/new')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update(
            $request->validate([
                'title'       => 'required|string|max:100',
                'description' => 'required|string',
                'price'       => 'required|integer',
                'stock'       => 'required|integer'
            ])
        );

        return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Berhasil Diperbaharui']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Berhasil Dihapus']);
    }
}
