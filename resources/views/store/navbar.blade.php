<nav class="bg-white fixed top-0 right-0 left-0 z-50 shadow-lg">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <img src="{{ asset('storage/image/sur-store.png') }}" alt="surstore" class="w-40 flex">
            <div class="hidden md:block">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-6 text-sm">
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/store/#"> Home </a>
                        </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/store/#product"> Product
                            </a>
                        </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </a>
                        </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </a>
                        </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Projects </a>
                        </li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div x-data="{ open: false }" class="flex items-center gap-4">
                <div class="relative sm:flex sm:gap-4">
                    <div class="flex gap-4">
                        <a href="{{ route('cart.index') }}" class="cart-icon group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                class="transition-transform duration-300 group-hover:rotate-12 group-hover:scale-110">
                                <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                    <path
                                        d="M5 7h13.79a2 2 0 0 1 1.99 2.199l-.6 6A2 2 0 0 1 18.19 17H8.64a2 2 0 0 1-1.962-1.608L5 7Z" />
                                    <path stroke-linecap="round" d="m5 7l-.81-3.243A1 1 0 0 0 3.22 3H2m6 18h2m6 0h2" />
                                </g>
                            </svg>
                        </a>
                        <button @click="open = !open"
                            class="flex gap-1 rounded-xl bg-[#0db760] px-3 py-1 text-sm font-medium text-white shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M313.6 304c-28.7 0-42.5 16-89.6 16c-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4c14.6 0 38.3 16 89.6 16c51.7 0 74.9-16 89.6-16c47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0S80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96s-96-43.1-96-96s43.1-96 96-96z" />
                            </svg>
                            <svg class="w-5 h-6 cursor-pointer text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition @click.away="open = false"
                            class="absolute right-0 mt-12 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                            <div class="py-2">
                                {{-- <img src="{{ asset('storage/' . $user->profile) }}" alt=""> --}}
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#31942432]">
                                    Profile
                                </a>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#31942432]">
                                    Settings
                                </a>
                                <form action="{{ route('logout') }}" method="POST"
                                    class="px-4 w-full hover:bg-red-200 border-t border-gray-300">
                                    @csrf
                                    <button type="submit" class="w-full text-left text-sm text-red-600 py-2">
                                        LogOut
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
