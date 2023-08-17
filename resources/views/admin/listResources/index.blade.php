@extends('layouts.toko')
@section('content')
    {{-- <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="card col-span-2 xl:col-span-1  rounded-xl">
            <div class="card-header flex justify-between">
                <p class="text-2xl text-black ">Daftar Produk</p>
                <a href="/create-products" class="btn-shadow ">Tambah Produk</a>
            </div>
            <div class="flex justify-between">
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-models">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Model Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-motif">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Motif Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-bahan">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Bahan Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-teknik">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Teknik Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-warna">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Warna Batik</h5>
                    </div>
                </div>

            </div>
            <div class="flex justify-between">

                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-custom">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Contoh Custom Batik</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1  rounded-xl">
            <div class="card-header flex justify-between">
                <p class="text-2xl text-black ">Data Sumber Daya</p>
            </div>
            <div class="flex">
                <div class="m-4 bg-white border border-gray-200 rounded-lg shadow w-48">
                    <a href="/add-kupon">
                        <img class=" w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center mb-4 ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Kupon</h5>
                    </div>
                </div>
                <div class="m-4 bg-white border border-gray-200 rounded-lg shadow w-48">
                    <a href="/add-detail-produk">
                        <img class=" w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center mb-4 ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Detail Produk</h5>
                    </div>
                </div>
                <div class="m-4 bg-white border border-gray-200 rounded-lg shadow w-48">
                    <a href="/add-kategori">
                        <img class=" w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center mb-4 ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Kategori Produk</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
