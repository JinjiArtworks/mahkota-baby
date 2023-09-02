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
                <a href="/products">
                    FAQ
                </a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <section class="bg-white py-4 rounded-b-xl my-10 rounded-xl">
        <div class="container mx-auto flex items-center flex-wrap  pb-12">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between px-2 py-3">
                    <a class=" tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Frequently Asked Question (FAQ)
                        <div class="flex transform hover:text-blue-500 ">
                            @if (Auth::check())
                                <a href="/faq-create">
                                    <p class="text-md p-2 flex items-center ml-5 text-secondary underline">
                                        <label for="modal_question"> + Kirim Pertanyaan </label>
                                    </p>
                                </a>
                            @else
                                <a href="/login">
                                    <p class="text-md p-2 flex items-center ml-5 text-secondary underline">
                                        <label> Login untuk mengirim pertanyaan </label>
                                    </p>
                                </a>
                            @endif
                        </div>
                    </a>
                    @foreach ($faq as $item)
                        <div class="collapse collapse-arrow bg-white border-2 border-secondary my-4" tabindex="0">
                            <input type="checkbox" />
                            <div class="collapse-title text-md font-medium ">
                                {{ $item->pesan }}
                            </div>
                            <div class="collapse-content mx-2">
                                @if ($item->jawaban != null)
                                    <p> -> {{ $item->jawaban }}</p>
                                    {{-- <div class="flex justify-end transform hover:text-blue-500 ">
                                        <a href="/faq-create">
                                            <p class="text-md p-2 flex items-center ml-5 text-secondary underline">
                                                <label for="modal_edit_question"> Ubah Pertanyaan </label>
                                            </p>
                                        </a>
                                        <form action="{{ route('faq.delete', ['id' => $item->id]) }}" method="GET">
                                            <button type="submit" class="deleteCart flex items-center text-red-600 mt-3">
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
                                    </div> --}}
                                @else
                                    <p>Belum ada jawaban.</p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </nav>
        </div>
    </section>
    <input type="checkbox" id="modal_question" class="modal-toggle" />
    <div class="modal">
        <form method="POST" class="modal-box" action="{{ route('faq.store') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="font-bold text-lg">Kirim Pertanyaan</h3>
            <label class="label">
                <span class="label-text">Pertanyaan</span>
            </label>
            <textarea type="text" placeholder="Type here" required name="pertanyaan"
                class="block p-2 text-gray-600 w-full text-sm"></textarea>

            <button class="confirm mt-4 btn-checkout rounded-xl font-semibold py-3 text-sm text-white uppercase w-full"
                style="background:#ef9fbc" type="submit">Konfirmasi
            </button>
        </form>
        <label class="modal-backdrop" for="modal_question">Close</label>
    </div>
@endsection
@section('script')
    <script>
        $('.confirm').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Pertanyaan?',
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
