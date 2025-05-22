@extends('layout.app')

@section('title', 'Login | SurStore')

@section('content')
    <div class="h-screen">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#34D399] to-[#06B6D4] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-md">
                    <h1 class="text-center text-2xl font-bold text-green-600 sm:text-3xl">Selamat Datang👋🏻</h1>

                    <p class="mx-auto mt-4 max-w-xl text-center text-gray-500">
                        Mulailah menjelajahi koleksi produk kami yang lengkap dan dengan harga yang terjangkau hanya di SurStore.
                    </p>

                    <form action="{{ route('login.submit') }}" method="POST"
                        class="bg-white mt-6 mb-0 space-y-4 rounded-lg p-4 shadow-xl sm:p-6 lg:py-10 lg:px-16  @if (session('failed')) ring-2 ring-red-500 shadow-2xl shadow-red-300 @endif">
                        @csrf
                        <p class="text-center text-lg font-medium">Login to your account</p>
                        @if (session('failed'))
                            <p class="text-red-600">{{ session('failed') }}</p>
                        @endif
                        @if (session('success'))
                            <p class="text-green-600">{{ session('success') }}</p>
                        @endif
                        <div>
                            <label for="Email"
                                class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <input type="email" id="Email"
                                    class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                    placeholder="Email" name="email" required />

                                <span
                                    class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                    Email
                                </span>
                            </label>
                        </div>

                        <div>
                            <label for="Password"
                                class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <input type="password" id="Password"
                                    class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                    placeholder="Password" name="password" required />

                                <span
                                    class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                    Password
                                </span>
                            </label>
                        </div>

                        <button type="submit"
                            class="cursor-pointer block w-full rounded-lg  bg-[#0db760] hover:bg-[#0a8b48] px-5 py-3 text-sm font-medium text-white">
                            Sign in
                        </button>

                        <p class="text-center text-sm text-gray-500">
                            No account?
                            <a class="underline" href="/register">Register</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#34D399] to-[#06B6D4] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
@endsection
