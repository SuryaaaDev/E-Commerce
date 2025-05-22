@extends('layout.app')

@section('navbar')
    @include('store.navbar')
@endsection

@section('content')
    <div class="relative overflow-hidden bg-white pt-30">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
            <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                <div class="sm:max-w-lg">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">New collection, redefined style.
                    </h1>
                    <p class="mt-4 text-xl text-gray-500">Our latest collection is here to make every step you take more
                        confident, with unmatched style and top-quality craftsmanship</p>
                    {{-- Koleksi terbaru kami hadir untuk membuat setiap langkah Anda lebih percaya diri, dengan gaya yang tak tertandingi dan kualitas terbaik. --}}
                </div>
                <div>
                    <div class="mt-10">
                        <div aria-hidden="true"
                            class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                            <div
                                class="absolute transform sm:top-0 sm:left-1/2 sm:translate-x-8 lg:top-1/2 lg:left-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                <div class="flex items-center space-x-6 lg:space-x-8">
                                    <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                    </div>
                                    <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                    </div>
                                    <div class="grid shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg"
                                                alt="" class="size-full object-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#product"
                            class="inline-block rounded-md border border-transparent bg-[#0db760] px-8 py-3 text-center font-medium text-white hover:bg-[#0a8b48]">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-3xl font-bold text-center py-6 mt-10" id="product">All Product</h1>
    <div class="h-auto flex items-center justify-center p-4 gap-2">
        @foreach ($products as $product)
            <div class="max-w-sm w-full bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product" class="w-full h-52 object-cover" />
                </div>

                <div class="p-5 space-y-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                        <p class="text-gray-500 mt-1">{{ $product->description }}</p>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($product->price) }}</p>
                        </div>

                        <div class="flex items-center gap-1">
                            <div class="text-yellow-400">★★★★</div>
                            <div class="text-gray-300">★</div>
                            <span class="text-sm text-gray-600 ml-1">(4.2)</span>
                        </div>
                    </div>
                    <div class="flex w-full justify-center items-center gap-2">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <button
                                class="cursor-pointer w-full px-24 bg-[#0db760]  hover:bg-[#0a8b48]  text-white font-medium py-3 rounded-lg transition-colors">
                                Add to Cart
                            </button>
                        </form>
                        <a href="/product/{{ $product->id }}"
                            class="cursor-pointer flex justify-center items-center w-auto py-2.5 px-4 bg-white border border-[#0db760] hover:bg-[#0db760] font-medium rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32"
                                class="text-[#0db760] hover:text-white">
                                <path fill="currentColor"
                                    d="M30.94 15.66A16.69 16.69 0 0 0 16 5A16.69 16.69 0 0 0 1.06 15.66a1 1 0 0 0 0 .68A16.69 16.69 0 0 0 16 27a16.69 16.69 0 0 0 14.94-10.66a1 1 0 0 0 0-.68ZM16 25c-5.3 0-10.9-3.93-12.93-9C5.1 10.93 10.7 7 16 7s10.9 3.93 12.93 9C26.9 21.07 21.3 25 16 25Z" />
                                <path fill="currentColor"
                                    d="M16 10a6 6 0 1 0 6 6a6 6 0 0 0-6-6Zm0 10a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('store.comment', ['commentsArray' => $commentsArray])

    <footer class="bg-gray-100">
        <div class="container px-6 py-8 mx-auto">
            <div class="flex flex-col items-center text-center">
                <a href="#">
                    <img src="{{ asset('storage/image/sur-store.png') }}" alt="surstore" class="w-1/4 m-auto">
                </a>

                <div class="flex flex-wrap justify-center mt-6 -mx-4">
                    <a href="#" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit"> Home </a>

                    <a href="#" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit"> About </a>

                    <a href="#" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit"> Teams </a>

                    <a href="#" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit"> Privacy </a>

                    <a href="#" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit"> Cookies </a>
                </div>

            </div>

            <hr class="my-6 border-gray-200 md:my-10 " />

            <div class="flex flex-col items-center sm:flex-row sm:justify-between">
                <p class="text-sm text-gray-500">© Copyright 2025. All Rights Reserved.</p>

                <div class="flex -mx-2">
                    <a href="https://www.instagram.com/suryaaa_28/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Reddit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="-2 -2 24 24">
                            <g fill="currentColor">
                                <path
                                    d="M14.017 0h-8.07A5.954 5.954 0 0 0 0 5.948v8.07a5.954 5.954 0 0 0 5.948 5.947h8.07a5.954 5.954 0 0 0 5.947-5.948v-8.07A5.954 5.954 0 0 0 14.017 0zm3.94 14.017a3.94 3.94 0 0 1-3.94 3.94h-8.07a3.94 3.94 0 0 1-3.939-3.94v-8.07a3.94 3.94 0 0 1 3.94-3.939h8.07a3.94 3.94 0 0 1 3.939 3.94v8.07z" />
                                <path
                                    d="M9.982 4.819A5.17 5.17 0 0 0 4.82 9.982a5.17 5.17 0 0 0 5.163 5.164a5.17 5.17 0 0 0 5.164-5.164A5.17 5.17 0 0 0 9.982 4.82zm0 8.319a3.155 3.155 0 1 1 0-6.31a3.155 3.155 0 0 1 0 6.31z" />
                                <circle cx="15.156" cy="4.858" r="1.237" />
                            </g>
                        </svg>
                    </a>

                    <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                            </path>
                        </svg>
                    </a>

                    <a href="https://github.com/SuryaaaDev/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-[#0db760]"
                        aria-label="Github">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
@endsection
