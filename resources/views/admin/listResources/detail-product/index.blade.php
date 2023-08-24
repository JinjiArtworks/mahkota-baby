@extends('layouts.toko')
@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1  rounded-xl">
            <div class="card-header flex justify-between">
                <p class="text-2xl text-black ">Daftar Deskripsi Produk</p>
                <a href="/create-detail-produk" class="btn-shadow ">Tambah Deskripsi Produk</a>
            </div>
            <table class="table-auto w-full text-left text-xs">
                <thead>
                    <tr class="">
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Brand</th>
                        <th class="p-4">Bahan</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Kandungan</th>
                    </tr>
                </thead>
                @foreach ($detailsProduct as $item)
                    <tbody>
                        <tr>
                            <td class="p-4 ">{{ $item->product->nama }}</td>
                            <td class="p-4">{{ $item->brand }}</td>
                            <td class="p-4">{{ $item->bahan }}</td>
                            <td class="p-4 leading-6 ">{{ $item->deskripsi }} </td>
                            <td class="p-4 leading-6">{{ $item->kandungan }}</td>
                            <td class="p-4">
                                <form action="{{ route('resources.edit', ['id' => $item->id]) }}">
                                    <button type="submit"">
                                        <i class="far fa-edit ml-2 mt-3 text-blue-600"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="p-4">
                                <form method="GET" action="{{ route('resources.delete', ['id' => $item->id]) }}">
                                    <button type="submit" class="deleteProduk">
                                        <i class="far fa-trash-alt ml-2 mt-3 text-red-600"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- End Recent Sales -->
@endsection
