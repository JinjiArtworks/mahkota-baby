<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
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
        return view('customers.products.products', compact('products','categories'));
    }
    public function detail($id)
    {
        $products = Product::find($id);
        $wishlist = Wishlist::whereProductId($id)->get();
        // return dd($products->id);
        // $getIdProducts = $products->id;
        return view('customers.products.detail-products', compact('products', 'wishlist'));
    }

    public function addToWishlist(Request $request)
    {
        // Send into Wishlist
        $user = Auth::user()->id;
        // return dd($user);

        Wishlist::create([
            'user_id' => $user,
            'product_id' => $request->products,
        ]);
        return redirect('/wishlist')->with('success', 'Produk berhasil ditambahkan kedalam wishlist');
    }

    // public function search(Request $request)
    // {
    //     $cat = Categories::all();
    //     if ($request->has('search')) {
    //         $products = Product::where('nama', 'LIKE', '%' . $request->search . '%')->get();
    //     } else {
    //         $products = Product::get();;
    //     }
    //     return view('customers.products.shop', compact('products','cat'));
    // }
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
