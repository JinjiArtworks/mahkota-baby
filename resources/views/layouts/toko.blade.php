<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/admins/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <title>Welcome To Cleopatra</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="bg-gray-100">
    @if (Auth::user()->roles != 'Customers')
        <!-- start navbar -->
        <div
            class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
            <!-- logo -->
            <div class="flex-none w-56 flex flex-row items-center">
                <img src="{{ asset('images/admins/logo.png') }}" class="w-10 flex-none">
                <strong class="capitalize ml-1 flex-1">Mahkota Baby Shop</strong>

            </div>
            <div id="navbar"
                class="animated md: md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-end items-center md:flex-col md:items-center">
                <div class="flex flex-row-reverse items-center">
                    <div class="dropdown relative md:static">
                        <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                            <div class="w-8 h-8 overflow- rounded-full">
                                <img class="w-full h-full object-cover" src="{{ asset('images/admins/user.svg') }}">
                            </div>
                            <div class="ml-2 capitalize flex ">
                                <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">
                                    {{ Auth::user()->name }} - {{ Auth::user()->roles }}</h1>

                                <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                            </div>
                        </button>
                        <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
                        <div
                            class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
                            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                                href="#">
                                <i class="fad fa-user-edit text-xs mr-1"></i>
                                edit my profile
                            </a>
                            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                                href="#">
                                <i class="fad fa-inbox-in text-xs mr-1"></i>
                                my inbox
                            </a>
                            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                                href="#">
                                <i class="fad fa-badge-check text-xs mr-1"></i>
                                tasks
                            </a>
                            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                                href="#">
                                <i class="fad fa-comment-alt-dots text-xs mr-1"></i>
                                chats
                            </a>
                            <hr>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                                    href="#">
                                    <i class="fad fa-user-times text-xs mr-1"></i>
                                    log out
                                </button>
                            </form>

                        </div>
                    </div>
                    {{-- <div class="dropdown relative mr-5 md:static">
                        <button
                            class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
                            <i class="fad fa-bells"></i>
                        </button>
                        <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
                        <div
                            class="menu hidden rounded bg-white md:right-0 md:w-full shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
                            <div
                                class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
                                <h1>notifications</h1>
                                <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                                    <strong>5</strong>
                                </div>
                            </div>
                            <hr>
                            <a class=" flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out"
                                href="#">
                                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                                    <i class="fad fa-birthday-cake text-sm"></i>
                                </div>
                                <div class="flex-1 flex flex-rowbg-green-100">
                                    <div class="flex-1">
                                        <h1 class="text-sm font-semibold">poll..</h1>
                                        <p class="text-xs text-gray-500">text here also</p>
                                    </div>
                                    <div class="text-right text-xs text-gray-500">
                                        <p>4 min ago</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <a class=" flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out"
                                href="#">

                                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                                    <i class="fad fa-user-circle text-sm"></i>
                                </div>

                                <div class="flex-1 flex flex-rowbg-green-100">
                                    <div class="flex-1">
                                        <h1 class="text-sm font-semibold">mohamed..</h1>
                                        <p class="text-xs text-gray-500">text here also</p>
                                    </div>
                                    <div class="text-right text-xs text-gray-500">
                                        <p>78 min ago</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <a class=" flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out"
                                href="#">
                                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                                    <i class="fad fa-images text-sm"></i>
                                </div>
                                <div class="flex-1 flex flex-rowbg-green-100">
                                    <div class="flex-1">
                                        <h1 class="text-sm font-semibold">new imag..</h1>
                                        <p class="text-xs text-gray-500">text here also</p>
                                    </div>
                                    <div class="text-right text-xs text-gray-500">
                                        <p>65 min ago</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <a class=" flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out"
                                href="#">
                                <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
                                    <i class="fad fa-alarm-exclamation text-sm"></i>
                                </div>
                                <div class="flex-1 flex flex-rowbg-green-100">
                                    <div class="flex-1">
                                        <h1 class="text-sm font-semibold">time is up..</h1>
                                        <p class="text-xs text-gray-500">text here also</p>
                                    </div>
                                    <div class="text-right text-xs text-gray-500">
                                        <p>1 min ago</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <div class="px-4 py-2 mt-2">
                                <a href="#"
                                    class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                                   Lihat P
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="dropdown relative mr-5 md:static">
                        <button
                            class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
                            <i class="fad fa-comments"></i>
                        </button>
                        <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
                        <div
                            class="menu hidden md:w-full md:right-0 rounded bg-white shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
                            <div
                                class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
                                <h1>messages</h1>
                                <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
                                    <strong>3</strong>
                                </div>
                            </div>
                            <a class=" flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out"
                                href="#">

                                <div
                                    class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
                                    <img class="w-full h-full object-cover" src="{{ asset('images/admins/user3.jpg') }}"
                                        alt="">
                                </div>

                                <div class="flex-1 flex flex-rowbg-green-100">
                                    <div class="flex-1">
                                        <h1 class="text-sm font-semibold">User </h1>
                                        <p class="text-xs text-gray-500">is typing ....</p>
                                    </div>
                                    <div class="text-right text-xs text-gray-500">
                                        <p>31 feb</p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <div class="px-4 py-2 mt-2">
                                <a href="/chat-admin"
                                    class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
                                    Lihat Obrolan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-screen flex flex-row flex-wrap">
            <div id="sideBar"
                class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
                <div class="flex flex-col">
                    <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>
                    {{-- @if (Auth::user()->roles == 'Super Admin') --}}
                    <a href="/admin-dashboard"
                        class="mb-3 capitalize  text-sm mt-2 hover:text-teal-700 transition ease-in-out duration-500">
                        <i class="fad fa-shopping-cart text-xs mr-2"></i>
                        ecommerce dashboard
                    </a>
                    {{-- @endif --}}
                    @if (Auth::user()->roles == 'Staff')
                        <a href="/admin-products"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-tshirt text-xs mr-2"></i>
                            Daftar Produk
                        </a>
                    @elseif (Auth::user()->roles == 'Super Admin')
                        <a href="/admin-products"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-tshirt text-xs mr-2"></i>
                            Daftar Produk
                        </a>
                        <a href="/admin-products"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            Pengembalian Pesanan
                        </a>
                        <a href="/admin-vendors"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            Pesanan Vendor
                        </a>
                        <a href="/admin-resources"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            Data Resources
                        </a>
                        <a href="/admin-faq"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            FAQ
                        </a>
                        {{-- <a href="/admin-kupons"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            Data Kupon
                        </a> --}}
                    @elseif (Auth::user()->roles == 'Admin')
                        <a href="/admin-resources"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            Data Resources
                        </a>
                        <a href="/admin-faq"
                            class="mb-3 text-sm mt-4 hover:text-teal-700 transition ease-in-out duration-500">
                            <i class="far fa-clipboard-list mr-2"></i>
                            FAQ
                        </a>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
        <!-- script -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @yield('script')
        <!-- end script -->
    @else
        <div class="flex justify-center my-4">
            <h2>Anda harus login sebagai admin.</h2>
            <span><a href="/" class="underline text-blue-600">Kembali</a></span>
        </div>
    @endif
</body>

</html>
