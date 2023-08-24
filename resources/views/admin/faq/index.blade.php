@extends('layouts.toko')
@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1  rounded-xl">
            <div class="card-header flex justify-between">
                <p class="text-2xl text-black ">Data Sumber Daya</p>
            </div>
            <div class="container mx-auto ">
                @foreach ($faq as $item)
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-gray-500 dark:text-gray-400">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                data-accordion-target="#accordion-flush-body-{{ $item->id }}" aria-expanded="true"
                                aria-controls="accordion-flush-body-{{ $item->id }}">
                                <span>Pertanyaan : {{ $item->pesan }}?</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-{{ $item->id }}" class="hidden"
                            aria-labelledby="accordion-flush-heading-1">
                            <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                @if ($item->jawaban != null)
                                    <div class="flex justify-between">
                                        <p class="mb-2 text-gray-500 dark:text-gray-400">Jawaban : {{ $item->jawaban }}</p>
                                            <form action="{{ route('admin-faq.delete', ['id' => $item->id]) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="deleteCart flex items-center text-red-600 mt-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        class="w-4 h-4 fill-current">
                                                        <path
                                                            d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                                        </path>
                                                        <rect width="32" height="200" x="168" y="216">
                                                        </rect>
                                                        <rect width="32" height="200" x="240" y="216">
                                                        </rect>
                                                        <rect width="32" height="200" x="312" y="216">
                                                        </rect>
                                                        <path
                                                            d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                    </div>
                                    <form method="POST" class="modal-box"
                                        action="{{ route('admin-faq.update', ['id' => $item->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('put') }}
                                        <textarea type="text" placeholder="Ubah Jawaban" required name="jawaban"
                                            class="border-2  mb-4 p-2 text-gray-600 w-full text-sm"></textarea>
                                        <button type="submit"
                                            class="text-white btn-shadow hover:bg-green-400  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 ">Kirim</button>
                                    </form>
                                @else
                                    <form method="POST" class="modal-box"
                                        action="{{ route('admin-faq.update', ['id' => $item->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('put') }}
                                        <textarea type="text" placeholder="Kirim Jawaban" required name="jawaban"
                                            class="border-2  mb-4 p-2 text-gray-600 w-full text-sm"></textarea>
                                        <button type="submit"
                                            class="text-white btn-shadow hover:bg-green-400  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 ">Jawab</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
