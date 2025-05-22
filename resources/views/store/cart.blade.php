@extends('layout.app')

@section('navbar')
    @include('store.navbar')
@endsection

@section('content')
    <div class="bg-gray-50 min-h-screen pt-20">
        <div class="container mx-auto px-6 py-12 bg-white shadow-lg rounded-xl overflow-hidden">
            @if ($carts->isempty())
                <h1 class="text-2xl font-bold text-center text-gray-500 py-6">Anda Belum Menambahkan Produk di Keranjang!
                </h1>
                <img src="{{ asset('storage/image/empty-cart.svg') }}" alt="Empty Cart" class="w-1/3 m-auto">
                <a href="/store/#product"
                    class="flex m-auto w-38 justify-center rounded-sm bg-indigo-600 px-5 py-3 mt-5 text-sm font-medium text-white hover:bg-indigo-700 focus:ring-3 focus:outline-hidden">
                    Tambah Produk
                </a>
            @else
                <h2 class="text-4xl font-semibold text-gray-900 mb-8 text-center">Keranjang Belanja</h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        @foreach ($carts as $cart)
                            <div
                                class="flex justify-between items-center p-4 border-b border-gray-300 hover:shadow-lg transition duration-200">
                                <div class="flex items-center space-x-4">
                                    <img src="{{asset('storage/' . $cart->image) }}" alt="{{ $cart->name }}"
                                        class="w-24 h-24 object-cover rounded-md">
                                    <div>
                                        <p class="text-xl font-semibold text-gray-800">{{ $cart->name }}</p>
                                        <p class="text-lg text-gray-500">Rp {{ number_format($cart->price) }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-500 cursor-pointer hover:text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M14 11v6m-4-6v6M6 7v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7M4 7h16M7 7l2-4h6l2 4" />
                                            </svg>
                                        </button>
                                    </form>

                                    <div class="flex items-center space-x-2 mt-2">
                                        <form action="{{ route('cart.updateQuantity', ['userId' => Auth::id(), 'productId' => $cart->id, 'action' => 'decrease']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="cursor-pointer">-</button>
                                        </form>

                                        <span class="text-lg px-5">{{ $cart->pivot->quantity }}</span>

                                        <form action="{{ route('cart.updateQuantity', ['userId' => Auth::id(), 'productId' => $cart->id, 'action' => 'increase']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="cursor-pointer">+</button>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div
                        class="bg-gray-100 h-74 p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-200">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Ringkasan Belanja</h3>
                        <div class="flex justify-between text-lg text-gray-700 mb-4">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal) }}</span>
                        </div>
                        <div class="flex justify-between text-lg text-gray-700 mb-4">
                            <span>Ongkir</span>
                            <span>Rp {{ number_format($ongkir) }}</span>
                        </div>
                        <div class="flex justify-between text-xl font-semibold text-gray-900 mb-6">
                            <span>Total</span>
                            <span>Rp {{ number_format($total) }}</span>
                        </div>
                        <button
                            class="w-full cursor-pointer bg-[#0db760] hover:bg-[#0a8b48] text-white py-3 rounded-xl transition duration-300">Proses
                            Pembayaran</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection