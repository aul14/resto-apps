<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservation.index') }}"
                    class="px-4 py-4 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Reservations</a>
            </div>
            <div class="m-2 p-2">
                <form action="{{ route('admin.reservation.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="first_name" class="mb-2 block text-sm font-medium text-gray-900 ">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="last_name" class="mb-2 block text-sm font-medium text-gray-900 ">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" id="email" name="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="tel_number" class="mb-2 block text-sm font-medium text-gray-900 ">Phone
                            Number</label>
                        <input type="number" id="tel_number" name="tel_number"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="res_date" class="mb-2 block text-sm font-medium text-gray-900 ">Reservation
                            Date</label>
                        <input type="datetime-local" id="res_date" name="res_date"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 " for="guest_number">Guest
                            Number</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="guest_number" name="guest_number" type="text" />
                    </div>
                    <div class="mb-6">
                        <label for="table_id" class="mb-2 block text-sm font-medium text-gray-900 ">Table</label>
                        <select name="table_id" id="table_id"
                            class="form-multiselect block w-full mt-1 border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }}</option>
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
