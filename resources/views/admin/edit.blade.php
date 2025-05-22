@extends('layout.app')

@section('title', 'Edit Products SurStore')
@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @if ($errors->any())
        <div class="fixed z-10 top-4 right-4">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm text-pink-500 border border-pink-100 rounded bg-pink-50"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-09 desc-09">
                    <title id="title-09">Icon title</title>
                    <desc id="desc-09">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Uploading failed!</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-gray-100 h-full">
        <div class="flex items-center justify-center p-12 pl-64">
            <div class="mx-auto w-full max-w-[550px] bg-white rounded-2xl hover:shadow-lg">
                <form class="py-6 px-9" action="{{ route('edit.submit', $productsArray['id']) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Name Product
                        </label>
                        <input type="text" name="name" id="name" placeholder="Your Product"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ $productsArray['name'] }}" />
                    </div>

                    <div class="mb-2">
                        <label for="price" class="mb-3 block text-base font-medium text-[#07074D]">
                            Price
                        </label>
                        <input type="text" name="price" id="price" placeholder="Rp"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            value="{{ number_format($productsArray['price'], 0, '', '') }}" />
                    </div>

                    <div class="mb-2">
                        <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                            Description
                        </label>
                        <textarea type="text" name="description" id="description" placeholder="Description Product"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $productsArray['description'] }}</textarea>
                    </div>
                    <div class="mb-6 pt-4" id="image-post">
                        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                            Upload Image
                        </label>

                        <div class="mb-8">
                            <input type="file" name="image" id="image" class="sr-only"
                                onchange="updateFileName()" />
                            <label for="image"
                                class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center"
                                id="file-name">
                                <div>
                                    <span class="mb-2 flex w-1/2 text-xl font-semibold text-[#07074D]">
                                        {{ substr($productsArray['image'], -20) }}
                                    </span>
                                    <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                        Or
                                    </span>
                                    <span
                                        class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                                        Edit
                                    </span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="hover:bg-[#5148ff]  cursor-pointer w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Edit Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateFileName() {
            var input = document.getElementById("image");

            var fileName = input.files.length > 0 ? input.files[0].name :
                "Pilih File";
            document.getElementById("file-name").textContent = fileName;
        }
    </script>
@endsection
