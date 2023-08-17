<?php

namespace App\Http\Controllers\Customers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\Returns;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $orders = Order::whereUsersId($user)->get();

        $getUsersCity = Auth::user()->city_id;
        $getUsersProvince = Auth::user()->province_id;
        $city  = City::whereId($getUsersCity)->first('name');
        $province  = Province::whereId($getUsersProvince)->first('name');


        $allCities = City::all();
        $allProvince = Province::all();
        return view('customers.riwayat.index', compact('orders', 'getUsersCity', 'getUsersProvince', 'city', 'province', 'allCities', 'allProvince'));
    }
    public function detailsOrder($id)
    {
        $getIdOrder = $id;
        $orderDetails = OrderDetail::whereOrderId($id)->get();
        $orderStatus = OrderDetail::whereOrderId($id)->first();

        $getUsersCity = Auth::user()->city_id;
        $getUsersProvince = Auth::user()->province_id;

        $city  = City::whereId($getUsersCity)->first('name');
        $province  = Province::whereId($getUsersProvince)->first('name');

        // return dd($reviews);
        $mytime = Carbon::now()->today()->toDateTimeString();
        return view('customers.riwayat.detail-orders', compact('getIdOrder', 'orderDetails', 'city',  'province', 'orderStatus', 'mytime'));
    }
    public function reviewPages($id)
    {
        $getIdOrder = $id;
        $reviews = Review::all();
        // return dd($reviews->product_id);
        $user = Auth::user()->id;
        $orderDetails = OrderDetail::whereProductId($id)->get();
        return view('customers.riwayat.send-review', compact('orderDetails','getIdOrder','reviews'));
    }
    public function storeReview(Request $request, $id)
    {
        $user = Auth::user()->id;
        $reviewsId = Review::get();
        // return dd($reviewsId->id);
        Review::create([
            'user_id' => $user,
            'tanggal' => Carbon::now(),
            'komentar' => $request->comment,
            'rating' => $request->rating,
            'product_id' => $id,
        ]);
        Product::where('id', $id)
            ->update(
                [
                    'rating' => $request->rating,
                ]
            );
        return redirect('riwayat-pesanan');
    }
    public function acceptOrder($id)
    {
        $mytime = Carbon::now()->today()->toDateTimeString();
        Order::where('id', $id)
            ->update(
                [
                    'status' => 'Selesai',
                    'updated_at' => $mytime
                ]
            );
        return redirect('riwayat-pesanan');
    }
    // public function remove($id)
    // {
    //     Order::where('id', $id)->delete();
    //     return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    // }
}
