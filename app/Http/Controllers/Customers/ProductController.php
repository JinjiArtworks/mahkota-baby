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
        // $products = Product::when($request->filter_price !=  null, function ($q) use ($request) {
        //     if ($request->filter_price == 'Termurah') {
        //         return $q->orderBy('harga', 'asc');
        //     } else {
        //         return $q->orderBy('harga', 'desc');
        //     }
        // })->where('alergi_id', '!=', $userAlergi)->get();
        $alergi = Alergi::get();
        $products = Product::when($request->filter_alergi !=  null, function ($q) use ($request) {
            if ($request->filter_alergi != null) {
                return $q->where('alergi_id', '!=', $request->filter_alergi);
            }
        })->get();
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

        return view('customers.products.products', compact('products', 'categories', 'userAlergi','alergi'));
    }
    public function detail($id)
    {
        $getId = $id;
        $products = Product::find($id);
        $detailProducts = DetailProduk::whereProductId($id)->first();
        $wishlist = Wishlist::all();
        return view('customers.products.detail-products', compact('products', 'wishlist', 'detailProducts'));
    }

    public function infoProduct(Request $request)
    {
        $detailProduk = DetailProduk::get();
        return view('customers.products.informasi-produk', compact('detailProduk'));
    }
    public function addToWishlist(Request $request)
    {
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
}
