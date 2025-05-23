@extends('layout.app')

@section('navbar')
    @include('store.navbar')
@endsection
@section('content')
    <div class="flex w-auto justify-center items-center pt-15">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 flex">
            <div class="flex flex-col md:flex-row">
                <img src="{{ asset('storage/' . $product->image) }}" alt=""
                    class="h-64 md:h-full md:w-1/2 rounded-lg flex items-center justify-center mr-10">
                <div class="md:flex-1 px-4">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                        {{ $product->name }}</h2>
                    <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">ABC
                            Company</a></p>
                    <div class="flex items-center space-x-4 my-4">
                        <div>
                            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                <span class="text-indigo-400 mr-1 mt-1">Rp</span>
                                <span class="font-bold text-indigo-600 text-3xl">{{ number_format($product->price) }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-500">{{ $product->description }}</p>
                    <div class="flex py-4 space-x-4">
                        <div class="relative">
                            <div
                                class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">
                                Qty</div>
                            <select
                                class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-12 h-14 flex items-end pb-1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                            <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>

                        <button type="button"
                            class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
