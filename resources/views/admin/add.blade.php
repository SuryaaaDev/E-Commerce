@extends('layout.app')

@section('title', 'Add Products SurStore')
@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="bg-gray-100 h-full">
        <div class="flex items-center justify-center p-12 pl-64">
            <div class="mx-auto w-full max-w-[550px] bg-white rounded-2xl hover:shadow-lg">
                <form class="py-6 px-9" action="{{ route('add.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Name Product
                        </label>
                        <input type="text" name="name" id="name" placeholder="Your Product"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="mb-2">
                        <label for="price" class="mb-3 block text-base font-medium text-[#07074D]">
                            Price
                        </label>
                        <input type="text" name="price" id="price" placeholder="Rp"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="mb-2">
                        <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                            Description
                        </label>
                        <textarea type="text" name="description" id="description" placeholder="Description Product"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                    </div>
                    <div class="mb-6 pt-4" id="image-post">
                        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                            Upload Image
                        </label>

                        <div class="mb-8">
                            <input type="file" name="image" id="image" class="sr-only"
                                onchange="updateFileName()" />
                            <label for="image"
                                class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center" id="file-name">
                                <div>
                                    <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                        Drop files here
                                    </span>
                                    <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                        Or
                                    </span>
                                    <span
                                        class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                                        Browse
                                    </span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="hover:bg-[#5148ff]  cursor-pointer w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Add Product
                        </button>
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
