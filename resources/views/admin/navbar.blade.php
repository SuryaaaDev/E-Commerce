<div class="fixed z-10">
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/image/sur-store.png') }}" alt="surstore" class="w-8/12">
                </div>
            </div>

            <div class="p-4">
                <div class="relative">
                    <input type="text"
                        class="w-full bg-gray-800 text-white rounded-md pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Search...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <nav class="mt-5 px-2">
                <div class="space-y-4">
                    <a href="/dashboard"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg  bg-gray-800 text-white group transition-all duration-200 hover:bg-gray-700">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M22 3H2v6h1v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9h1V3zM4 5h16v2H4V5zm15 15H5V9h14v11zM9 11h6a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                                </svg>
                                Product
                            </div>
                            <svg :class="{ 'rotate-180': open }"
                                class="ml-2 h-5 w-5 transform transition-transform duration-200"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="space-y-1 pl-11">
                            <a href="/product"
                                class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                All Product
                            </a>
                            <a href="/product/add"
                                class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                                Add Product
                            </a>
                        </div>
                    </div>

                    <a href="/users"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87m-3-12a4 4 0 0 1 0 7.75" />
                            </g>
                        </svg>
                        Users
                    </a>

                    <a href="/comments"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <g fill="none">
                                <path fill="currentColor"
                                    d="m4.327 6.638l.891.454zm.441 13.594l-.707-.707zm13.594-3.559l.454.891zm1.311-1.311l.891.454zm0-8.724l.891-.454zm-1.311-1.311l.454-.891zm-12.724 0l.454.891zm2.07 11.966L7 16.586zM5 9.8c0-.857 0-1.439.038-1.889c.035-.438.1-.663.18-.819l-1.782-.908c-.247.485-.346 1.002-.392 1.564C3 8.298 3 8.976 3 9.8zM5 12V9.8H3V12zm-2 0v5h2v-5zm0 5v2.914h2V17zm0 2.914c0 1.291 1.562 1.938 2.475 1.025l-1.414-1.414a.55.55 0 0 1 .939.389zm2.475 1.025L8.415 18L7 16.586l-2.939 2.939zM15.2 16H8.414v2H15.2zm2.708-.218c-.156.08-.38.145-.819.18c-.45.037-1.032.038-1.889.038v2c.824 0 1.501 0 2.052-.044c.562-.046 1.079-.145 1.564-.392zm.874-.874a2 2 0 0 1-.874.874l.908 1.782a4 4 0 0 0 1.748-1.748zM19 12.2c0 .857 0 1.439-.038 1.889c-.035.438-.1.663-.18.819l1.782.908c.247-.485.346-1.002.392-1.564c.045-.55.044-1.228.044-2.052zm0-2.4v2.4h2V9.8zm-.218-2.708c.08.156.145.38.18.819C19 8.361 19 8.943 19 9.8h2c0-.824 0-1.501-.044-2.052c-.046-.562-.145-1.079-.392-1.564zm-.874-.874a2 2 0 0 1 .874.874l1.782-.908a4 4 0 0 0-1.748-1.748zM15.2 6c.857 0 1.439 0 1.889.038c.438.035.663.1.819.18l.908-1.782c-.485-.247-1.002-.346-1.564-.392C16.702 4 16.024 4 15.2 4zM8.8 6h6.4V4H8.8zm-2.708.218c.156-.08.38-.145.819-.18C7.361 6 7.943 6 8.8 6V4c-.824 0-1.501 0-2.052.044c-.562.046-1.079.145-1.564.392zm-.874.874a2 2 0 0 1 .874-.874l-.908-1.782a4 4 0 0 0-1.748 1.748zM8.414 18v-2A2 2 0 0 0 7 16.586z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 9h8m-8 4h5" />
                            </g>
                        </svg>
                        Comments
                    </a>

                    <a href="/information"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-width="2" />
                                <path stroke-width="3" d="M12 8h.01v.01H12z" />
                                <path stroke-linecap="round" stroke-width="2" d="M12 12v4" />
                            </g>
                        </svg>
                        Information
                    </a>
                </div>
            </nav>

            <div x-data="{ open: false }" class="border-t border-gray-700 my-4">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div class="ml-3">
                            @if (Auth::check())
                                <p class="text-sm font-medium text-white text-left">{{ Auth::user()->username }}</p>
                            @endif

                            <p class="text-xs text-gray-400">View menu</p>
                        </div>
                    </div>
                    <svg :class="{ 'rotate-180': open }"
                        class="ml-2 h-5 w-5 transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="space-y-1 pl-11 rounded-lg">
                    <a href="#"
                        class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Profile
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="group w-full flex items-center px-4 py-2 text-sm text-red-500 rounded-md hover:bg-gray-700 hover:text-white">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </aside>
    </div>
</div>
