<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-4 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Tables</a>
            </div>
            <div class="m-2 p-2">
                <form action="{{ route('admin.tables.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Name</label>
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-lg border @error('name') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('name') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('name')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white "
                            for="guest_number">Guest
                            Number</label>
                        <input
                            class="block w-full rounded-lg border @error('guest_number') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('guest_number') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="guest_number" name="guest_number" type="text" />
                        @error('guest_number')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="status"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Status</label>
                        <select name="status" id="status"
                            class="form-multiselect block w-full rounded-lg border @error('status') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('status') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="location"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Location</label>
                        <select name="location" id="location"
                            class="form-multiselect block w-full rounded-lg border @error('location') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('location') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @error('location')
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
