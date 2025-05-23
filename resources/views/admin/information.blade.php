@extends('layout.app')

@section('title', 'Information SurStore')
@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen ml-64">
        <div
            class="flex w-full max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg animate-pulse">
            <div class="w-1/3 bg-gray-300"></div>

            <div class="w-2/3 p-4 md:p-4">
                <h1 class="w-40 h-2 bg-gray-200 rounded-lg"></h1>

                <p class="w-48 h-2 mt-4 bg-gray-200 rounded-lg"></p>

                <div class="flex mt-4 item-center gap-x-2">
                    <p class="w-5 h-2 bg-gray-200 rounded-lg"></p>
                    <p class="w-5 h-2 bg-gray-200 rounded-lg"></p>
                    <p class="w-5 h-2 bg-gray-200 rounded-lg"></p>
                    <p class="w-5 h-2 bg-gray-200 rounded-lg"></p>
                    <p class="w-5 h-2 bg-gray-200 rounded-lg"></p>
                </div>

                <div class="flex justify-between mt-6 item-center">
                    <h1 class="w-10 h-2 bg-gray-200 rounded-lg"></h1>

                    <div class="h-4 bg-gray-200 rounded-lg w-28"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
