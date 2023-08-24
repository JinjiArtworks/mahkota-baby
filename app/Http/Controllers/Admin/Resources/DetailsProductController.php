<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DetailProduk;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailsProductController extends Controller
{
    public function index()
    {
        $detailsProduct = DetailProduk::get();
        // return dd($detailsProduct);
        return view('admin.listResources.detail-product.index', compact('detailsProduct'));
    }
    // Add vendor
    public function create()
    {
        $detailsProduct = DetailProduk::all();
        $products = Product::all();
        // return dd($categories);
        return view('admin.listResources.detail-product.create', compact('detailsProduct','products'));
    }
    public function store(Request $request)
    {
        DetailProduk::create([
            'product_id' => $request->product_id,
            'bahan' => $request->bahan,
            'brand' => $request->brand,
            'deskripsi' => $request->deskripsi,
            'kandungan' => $request->kandungan,
        ]);
        return redirect('/add-detail-produk')->with('success', 'Detail Produk berhasil ditambahkan');
    }
    public function edit($id)
    {
        $detailsProduct = DetailProduk::find($id);
        $products = Product::all();
        return view('admin.listResources.detail-product.edit', compact('detailsProduct','products'));
    }
    public function update(Request $request, $id)
    {
        DetailProduk::where('id', $id)
            ->update(
                [
                    'product_id' => $request->product_id,
                    'deskripsi' => $request->deskripsi,
                    'bahan' => $request->bahan,
                    'kandungan' => $request->kandungan,
                    'brand' => $request->brand
                ]
            );
        return redirect('/add-detail-produk')->with('success', 'Kupon berhasil diubah.');
    }
    public function destroy($id)
    {
        DetailProduk::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Kupon berhasil dihapus.');
    }
}
