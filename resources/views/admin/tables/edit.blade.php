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
                <form action="{{ route('admin.tables.update', $table) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" id="name" name="name" value="{{ $table->name }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 " for="guest_number">Guest
                            Number</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="guest_number" name="guest_number" type="text" value="{{ $table->guest_number }}" />
                    </div>
                    <div class="mb-6">
                        <label for="status" class="mb-2 block text-sm font-medium text-gray-900 ">Status</label>
                        <select name="status" id="status"
                            class="form-multiselect block w-full mt-1 border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>
                                    {{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="location" class="mb-2 block text-sm font-medium text-gray-900 ">Location</label>
                        <select name="location" id="location"
                            class="form-multiselect block w-full mt-1 border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>
                                    {{ $location->name }}</option>
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
