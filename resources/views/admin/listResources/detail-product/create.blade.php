@extends('layouts.toko')
@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="card-header flex justify-between">
                <p class="text-2xl text-black ">Tambah Detail Produk</p>
            </div>
            <div class="p-6">
                <form method="POST" action="/store-detail-produk" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Nama Produk</label>
                        <select name="product_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3">
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="bahan" class="block mb-2 text-sm font-medium text-gray-900 ">Bahan Produk</label>
                        <input type="text" name="bahan" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  w-full p-3"
                            placeholder="Masukkan Bahan Produk" required>
                    </div>
                    <div class="mb-4">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Brand Produk</label>
                        <input type="text" name="brand" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  w-full p-3"
                            placeholder="Masukkan Brand Produk" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Produk</label>
                        <textarea type="text" name="deskripsi" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  w-full p-3"
                            placeholder="Masukkan Deskripsi Produk" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kandungan" class="block mb-2 text-sm font-medium text-gray-900 ">Kandungan Produk</label>
                        <textarea type="text" name="kandungan" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  w-full p-3"
                            placeholder="Masukkan Kandungan Produk" required></textarea>
                    </div>
                    <button type="submit"
                        class="text-white btn-shadow hover:bg-green-400  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 ">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
