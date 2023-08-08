<?php

namespace App\Http\Controllers\Customers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
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
        return view('customers.riwayat.index', compact('orders','getUsersCity','getUsersProvince','city','province','allCities','allProvince'));
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
        // return dd($orderDetails);
        $reviews = Review::all();
        $mytime = Carbon::now()->today()->toDateTimeString();
        return view('customers.riwayat.detail-orders', compact('getIdOrder', 'orderDetails', 'city','province','orderStatus','reviews','mytime'));

    }

    public function store(Request $request, $id)
    {
        $user = Auth::user()->id;
        $product = Review::create([
            'users_id' => $user,
            'products_id' => $id,
            'tanggal' => Carbon::now(),
            'komentar' => $request->comment,
            'rating' => $request->rating
        ]);
        return redirect('history-order');
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
        return redirect('history-order');
    }
    public function remove($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }
}
