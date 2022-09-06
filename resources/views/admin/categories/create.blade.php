<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}"
                    class="px-4 py-4 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Categories</a>
            </div>
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" id="name"
                            class="block w-full rounded-lg border @error('name') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('name') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            name="name" />
                        @error('name')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 " for="image">Upload image</label>
                        <input
                            class="block w-full cursor-pointer rounded-lg border @error('image') border-red-300 @enderror bg-gray-50 text-sm text-gray-900 focus:outline-none  @error('image') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                            aria-describedby="image_help" id="image" name="image" type="file" />
                        @error('image')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description"
                            class="mb-2 block text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block w-full rounded-lg border border-red-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500  @error('description') dark:border-red-600  @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"></textarea>
                        @error('description')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
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
