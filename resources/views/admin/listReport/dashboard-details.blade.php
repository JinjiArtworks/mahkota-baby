@extends('layouts.toko')
@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="card mt-6">
            <div class="card-body">
                <div class="flex justify-between font-bold text-lg mx-4 my-2">
                    <h2>Detail Pesanan</h2>
                    @if ($orders->status == 'Sedang Diproses')
                        <form method="POST" action="{{ route('dashboard.update', ['id' => $orders->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <button type="submit" class="send-order btn-shadow text-xs text-black">Kirim Pesanan</button>
                        </form>
                    @endif
                </div>
                <div class="mb-4 ml-4">
                    <p class="text-black mb-2">Penerima : {{ $orders->nama }}</p>
                    <p class="text-black mb-2">Alamat : {{ $orders->alamat }}</p>
                    <p class="text-black">Nomor Handphone : {{ $orders->no_handphone }}</p>
                </div>
                <hr class="m-4">
                <table class="table-auto w-full text-left text-sm">
                    <thead>
                        <tr class="">
                            {{-- <th class="p-4 ">Nama Pelanggan</th>
                                <th class="p-4 ">Nomor Handphone </th>
                                <th class="p-4 ">Alamat </th> --}}

                            <th class="p-4 ">Gambar</th>
                            <th class="p-4 ">Nama produk</th>
                            <th class="p-4 ">Harga</th>
                            <th class="p-4 ">Quantity</th>
                            <th class="p-4 ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetails as $item)
                            <tr>
                                {{-- <td class="p-4">{{ $orderdetails->order->nama }}</td>
                                <td class="p-4">{{ $orderdetails->order->no_handphone }}</td>
                                <td class="p-4">{{ $orderdetails->order->alamat }}</td> --}}
                                <td class="p-4">
                                    <img src="{{ asset('images/' . $item->product->gambar) }}" class="w-20 h-20 "
                                        alt="">
                                </td>
                                <td class="p-4">{{ $item->product->nama }}</td>
                                <td class="p-4">@currency($item->product->harga)</td>
                                <td class="p-4">{{ $item->qty }}</td>
                                <td class="p-4">@currency($item->harga * $item->qty)</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.send-order').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Pesanan?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
