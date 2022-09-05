<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-4 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Menus</a>
            </div>
            <div class="m-2 p-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.menus.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>

                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 " for="image">Upload image</label>
                        <input
                            class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                            aria-describedby="image_help" id="image" name="image" type="file" />
                    </div>
                    <div class="mb-6">
                        <label for="price" class="mb-2 block text-sm font-medium text-gray-900 ">Price</label>
                        <input type="number" min="0.00" max="1000000.00" step="0.01" id="price"
                            name="price"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="description"
                            class="mb-2 block text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" rows="4" name="description"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="description"
                            class="mb-2 block text-sm font-medium text-gray-900 ">Categories</label>
                        <select multiple name="categories[]" id="categories"
                            class="form-multiselect block w-full mt-1 border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Submit</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
