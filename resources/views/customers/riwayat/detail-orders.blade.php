@extends('layouts.customers')
@section('breadcrumbs')
    <div class="text-sm breadcrumbs mt-4">
        <ul>
            <li>
                <a href="/">
                    Home
                </a>
            </li>
            <li>
                <a href="/riwayat-pesanan">
                    Riwayat Pesanan
                </a>
            </li>
            <li>
                <a href="/detail-pesanan/{{ $getIdOrder }}">
                    Detail Riwayat Pesanan
                </a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <section class="py-8 rounded-b-xl mb-10 ">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div class="bg-white p-3 shadow-sm border-2 border-secondary rounded-xl w-full">
                <div class="w-full px-6 rounded-l-xl">
                    <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8 ">
                        <span class="tracking-wide text-xl underline my-3">Detail Pesanan </span>
                        <span class=" text-lfont-semibold ">Status Pesanan :

                            <span class="text-primary">
                                {{ $orderStatus->order->status }}
                            </span>
                        </span>
                    </div>
                    @if ($orderStatus->order->status == 'Pesanan Dikirim')
                        <div class="flex items-center justify-end space-x-2 font-semibold text-gray-900 leading-8 ">
                            <form method="POST" action="{{ route('history-order.acceptOrder', ['id' => $getIdOrder]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <button class="mt-4 btn-checkout rounded-xl font-semibold p-3 text-xs text-white uppercase "
                                    style="background:#ef9fbc" type="submit">Terima Pesanan
                                </button>
                            </form>
                        </div>
                    @endif
                    <div class=" flex justify-end ">
                        @if ($orderStatus->order->status == 'Sedang Dikirim')
                            <a href="/detail-pesanan/{{ $getIdOrder }}"
                                class="btn btn-sm text-white bg-secondary hover:bg-primary rounded-xl text-sm text-center">
                                Terima Pesanan</a>
                        @elseif ($orderStatus->order->status == 'Selesai')
                        @endif
                    </div>
                    <div class="mt-4 border-b pb-8">
                        <h2 class="font-semibold text-sm text-gray-600">Penerima : <span
                                class=" font-normal ">{{ Auth::user()->name }}</span></h2>
                        <h2 class="font-semibold text-sm  my-2">Nomor Handphone : <span
                                class=" font-normal ">{{ Auth::user()->phone }}</span></h2>
                        <h2 class="font-semibold text-sm text-gray-600">Alamat :
                            <span class=" font-normal ">{{ Auth::user()->address }} - {{ $city->name }},
                                {{ $province->name }}</span>
                        </h2>

                    </div>
                    <div class="flex mt-5 mb-5">
                        <h3 class="font-semibold text-xs uppercase w-2/5">Product Details</h3>
                        <h3 class="font-semibold text-xs uppercase w-1/5 text-center">Quantity</h3>
                        <h3 class="font-semibold text-xs uppercase w-1/5 text-center">Price</h3>
                        <h3 class="font-semibold text-xs uppercase w-1/5 text-center">Total</h3>
                    </div>
                    @foreach ($orderDetails as $item)
                        <div class="flex items-center hover:bg-pink-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5"> <!-- product -->
                                <div class="w-28">
                                    <img class="h-24" src="{{ asset('images/' . $item->product->gambar) }}"
                                        alt="">
                                </div>
                                <div class="flex flex-col justify-center ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{ $item->product->nama }}</span>
                                    <span class="font-normal text-xs">Ukuran : {{ $item->product->ukuran }}</span>
                                </div>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">x{{ $item->qty }}</span>
                            @if ($item->diskon == null)
                                <span class="text-center w-1/5 font-semibold text-sm">@currency($item->harga)</span>
                            @else
                                <span class="text-center w-1/5 font-semibold text-sm">@currency($item->harga - $item->diskon)</span>
                            @endif
                            <span class="text-center w-1/5 font-semibold text-sm">@currency($item->harga * $item->qty)</span>
                            <form method="GET"
                                action="{{ route('history-order.reviewPages', ['id' => $item->product_id]) }}"
                                enctype="multipart/form-data">
                                <button class="flex text-secondary text-xs hover:text-primary underline">
                                    Review
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white p-3 shadow-sm border-2 border-secondary rounded-xl w-full mt-4">
                <div class="w-full px-6 rounded-l-xl">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Ongkos Kirim</th>
                                    <th>Diskon</th>
                                    <th>Ekspedisi</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $item->order->tanggal_orders }}</td>
                                    <td>@currency($item->order->ongkos_kirim)</td>
                                    <td>@currency($item->order->diskon)</td>
                                    @if ($item->order->ekspedisi == 'REG')
                                        <td>JNE - {{ $item->order->ekspedisi }} (2-3 Hari)</td>
                                    @else
                                        <td>JNE - {{ $item->order->ekspedisi }} (3-4 Hari)</td>
                                    @endif
                                    <td>{{ $item->order->jenis_pembayaran }}</td>
                                    <td>@currency($item->order->total)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <input type="checkbox" id="my_modal_7" class="modal-toggle" />
        <div class="modal">
            <form method="POST" class="modal-box"
                action="{{ route('history-order.review', ['id' => $item->product_id]) }}" enctype="multipart/form-data">
                @csrf
                <h3 class="font-bold text-lg">Berikan Review</h3>
                <label class="label">
                    <span class="label-text">{{ $item->product_id }}</span>
                </label>
                <label class="label">
                    <span class="label-text">Rating</span>
                </label>
                <div class="rating">
                    <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-orange-400"
                        checked />
                </div>
                <label class="label">
                    <span class="label-text">Komentar</span>
                </label>
                <textarea name="comment" class="block p-2 text-gray-600 w-full text-sm" placeholder="Masukkan Komentar"></textarea>
                <button class="mt-4 btn-checkout rounded-xl font-semibold p-3 text-xs text-white uppercase "
                    style="background:#ef9fbc" type="submit">Konfirmasi
                </button>
            </form>
            <label class="modal-backdrop" for="my_modal_7">Close</label>
        </div> --}}
    </section>
@endsection
