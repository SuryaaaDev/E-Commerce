@vite('resources/css/app.css')

<h2 class="text-center pt-15 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
    Read trusted reviews from our customers
</h2>
<form method="POST" action="{{ route('add.comment') }}" class="w-1/2 bg-white rounded-lg px-4 pt-2 flex m-auto">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
        <div class="w-full md:w-full px-3 mb-2 mt-2">
            <textarea
                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                name="content" placeholder='Type Your Comment' required></textarea>
        </div>
        <div class="w-full md:w-full flex items-start px-3">
            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs md:text-sm pt-px">Komen dengan sopan</p>
            </div>
            <div class="-mr-1">
                <button type="submit"
                    class="bg-white text-gray-700 cursor-pointer font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Post
                    Comment</button>
            </div>
        </div>
    </div>
</form>

<section class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="mt-8 columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
            @foreach ($commentsArray as $comment)
                <div class="break-inside-avoid rounded-lg bg-gray-50 p-6 shadow-sm inline-block w-full">
                    <div class="flex items-center gap-4">
                        <div class="bg-white p-4 rounded-full shadow-sm">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.993 10.573a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9ZM10 0a6 6 0 0 1 3.04 11.174c3.688 1.11 6.458 4.218 6.955 8.078c.047.367-.226.7-.61.745c-.383.045-.733-.215-.78-.582c-.54-4.19-4.169-7.345-8.57-7.345c-4.425 0-8.101 3.161-8.64 7.345c-.047.367-.397.627-.78.582c-.384-.045-.657-.378-.61-.745c.496-3.844 3.281-6.948 6.975-8.068A6 6 0 0 1 10 0Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-gray-900">
                                {{ $comment['user_name'] }}
                            </p>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700">
                        {{ $comment['content'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

</section>
