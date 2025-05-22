@extends('layout.app')

@section('title', 'Register | SurStore')

@section('content')
    <div class="h-screen">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-lg">
                    <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Daftar Akun</h1>

                    <p class="mx-auto mt-4 max-w-xl text-center text-gray-500">
                        Buat akun Anda hari ini untuk mendapatkan produk yang berkualitas. Bergabunglah dengan komunitas belanja kami sekarang!
                    </p>

                    <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data"
                        class="bg-white mt-6 mb-0 space-y-4 rounded-lg p-4 shadow-xl sm:p-6 lg:py-10 lg:px-16">
                        @csrf
                        <p class="text-center text-lg font-medium">Create your account</p>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div>
                            <label for="Profile"
                                class="relative cursor-pointer block rounded-md border-dashed border-2 border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <input type="file" id="Profile"
                                    class="peer hidden w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                    name="profile" onchange="updateFileName()" />

                                <span
                                    class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                    Foto Profil
                                </span>
                                <span class="text-gray-700 text-sm" id="file-name">
                                    Pilih File
                                </span>
                            </label>
                            <p class="text-gray-600 text-xs">*tidak wajib di isi</p>
                        </div>
                        <div class="flex gap-3">
                            <div>
                                <label for="Username"
                                    class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="text" id="Username"
                                        class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                        name="username" required />

                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        Username
                                    </span>
                                </label>
                            </div>

                            <div>
                                <label for="Email"
                                    class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="email" id="Email"
                                        class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                        name="email" required />

                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        Email
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="Telepon"
                                class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <input type="tel" id="Telepon" name="telepon"
                                    class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                    required />

                                <span
                                    class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                    Telepon
                                </span>
                            </label>
                        </div>

                        <div>
                            <label for="Password"
                                class="relative block rounded-md border border-gray-200 p-3 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <input type="password" id="Password"
                                    class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                                    name="password" required />

                                <span
                                    class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                    Password
                                </span>
                            </label>
                        </div>

                        <button type="submit"
                            class="block cursor-pointer w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                            Create
                        </button>

                        <p class="text-center text-sm text-gray-500">
                            Have account?
                            <a class="underline" href="/login">Login</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateFileName() {
            var input = document.getElementById("Profile");
            var fileName = input.files.length > 0 ? input.files[0].name :
                "Pilih File"; 

            document.getElementById("file-name").textContent = fileName;
        }
    </script>
@endsection
