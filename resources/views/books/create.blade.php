<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('books.index') }}"
                class="px-4 m-2 py-2 bg-indigo-700 text-white top-4 left-6 rounded-lg">Books</a>
            <div class="w-full bg-slate-100 m-2 p-4 rounded-lg">

                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                  
                  @csrf

                    <div class="mb-6">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Title</label>
                        <input type="text" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Title for Book" >

                            @error('title')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>

                            @error('description')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Upload file</label>
                        <input
                            class="block w-full text-sm p-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" type="file" name="image">

                            @error('image')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                        <input type="text" name="isbn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter ISBN number of book" >

                            @error('isbn')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <label for="year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publish Year</label>
                        <input type="text" name="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Publish year" >

                            @error('year')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Price</label>
                        <input type="text" name="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Book Price" >

                            @error('price')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                      <div class="mb-6">
                        <label for="page_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Page Number</label>
                        <input type="number" name="page_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Page Number" >

                            @error('page_number')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    {{-- <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                            me</label>
                    </div> --}}
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>
