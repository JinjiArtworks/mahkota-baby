<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Categories::all();
        return view('customers.products.products', compact('products', 'categories'));
    }
    public function detail($id)
    {
        $products = Product::find($id);
        $wishlist = Wishlist::all();
        // return dd($products->id);
        // return dd($wishlist);
        // $getIdProducts = $products->id;
        return view('customers.products.detail-products', compact('products', 'wishlist'));
    }

    public function infoProduct(Request $request)
    {
        $detailProduk = DetailProduk::get();
        // return dd($detailProduk->product_id);
        // $products = Product::whereId($detailProduk->product_id)->get();
        // return dd($products);
        // return dd($detailProduk->product->nama);
        return view('customers.products.informasi-produk', compact('detailProduk'));
    }
    public function addToWishlist(Request $request)
    {
        // Send into Wishlist
        $user = Auth::user()->id;
        Wishlist::create([
            'user_id' => $user,
            'product_id' => $request->id,
        ]);

        return redirect('/wishlist')->with('success', 'Produk berhasil ditambahkan kedalam wishlist');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $products = Product::get();;
        }
        return view('customers.products.products', compact('products'));
    }
    // public function searchByCat(Request $request)
    // {
    //     $cat = Categories::all();
    //     if ($request->has('cat')) {
    //         $products = Product::where('categories_id', 'LIKE', '%' . $request->cat . '%')->paginate(5);
    //     } else {
    //         $products = Product::paginate(5);
    //     }
    //     return view('customers.products.shop', compact('products','cat'));
    // }
}
