<?php

namespace App\Http\Controllers\Customers;

use App\Models\Alergi;
use App\Models\Categories;
use App\Models\DetailProduk;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();
        if (Auth::check()) {
            $userAlergi = Auth::user()->alergi_id;
        }
        $products = Product::when($request->filter_price !=  null, function ($q) use ($request) {
            if ($request->filter_price == 'Termurah') {
                return $q->orderBy('harga', 'asc');
            } else {
                return $q->orderBy('harga', 'desc');
            }
        })->where('alergi_id', '!=', $userAlergi)->get();

        // This is if select is multiple and going at the same time
        // $today = Carbon::now()->format('Y-m-d');
        // $products = Product::when(
        //     $request->filter_price !=  null,
        //     function ($q) use ($request) {
        //         return $q->where('harga', $request->filter_price);
        //     },
        //     // for second select
        //     function ($q) use ($today) {
        //         return $q->where('harga', $today);
        //     }
        // )->when(
        //     $request->filter_price !=  null,
        //     function ($q) use ($request) {
        //         return $q->where('harga', $request->filter_price);
        //     },
        // )->get();

        return view('customers.products.products', compact('products', 'categories', 'userAlergi'));
    }
    public function detail($id)
    {
        $getId = $id;
        // return dd($getId);
        $products = Product::find($id);
        $detailProducts = DetailProduk::whereProductId($id)->first();
        // return dd($detailProducts);

        $wishlist = Wishlist::all();
        // return dd($products->id);
        // return dd($wishlist);
        // $getIdProducts = $products->id;
        return view('customers.products.detail-products', compact('products', 'wishlist', 'detailProducts'));
    }

    public function infoProduct(Request $request)
    {
        $detailProduk = DetailProduk::get();
        // return dd($detailProduk->alergi->nama);
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
