<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Province;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $wishlist = Wishlist::whereUserId($user)->get(); 
        // return dd($wishlist);
        $getUsersCity = Auth::user()->city_id;
        $getUsersProvince = Auth::user()->province_id;
        $city  = City::whereId($getUsersCity)->first('name');
        $province  = Province::whereId($getUsersProvince)->first('name');
        $allCities = City::all();
        $allProvince = Province::all();
        return view('customers.wishlist.index', compact('wishlist','getUsersCity','getUsersProvince','city','province','allCities','allProvince'));
        
    }
    public function destroy(Request $request)
    {
        Wishlist::where('products_id', $request->products)->delete();
        return redirect()->back();
    }
}
