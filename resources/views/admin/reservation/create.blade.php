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
                        <label for="first_name"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                            class="block w-full rounded-lg border @error('first_name') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('first_name') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('first_name')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="last_name"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                            class="block w-full rounded-lg border @error('last_name') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('last_name') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('last_name')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="block w-full rounded-lg border @error('email') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('email') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('email')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="tel_number"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Phone
                            Number</label>
                        <input type="number" id="tel_number" name="tel_number" value="{{ old('tel_number') }}"
                            class="block w-full rounded-lg border @error('tel_number') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('tel_number') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('tel_number')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="res_date"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Reservation
                            Date</label>
                        <input type="datetime-local" id="res_date" name="res_date" value="{{ old('res_date') }}"
                            class="block w-full rounded-lg border @error('res_date') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('res_date') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
                        @error('res_date')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white "
                            for="guest_number">Guest
                            Number</label>
                        <input
                            class="block w-full rounded-lg border @error('guest_number') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('guest_number') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="guest_number" name="guest_number" type="text" value="{{ old('guest_number') }}" />
                        @error('guest_number')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="table_id"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">Table</label>
                        <select name="table_id" id="table_id"
                            class="form-multiselect block w-full rounded-lg border @error('table_id') border-red-300 @enderror bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 @error('table_id') dark:border-red-600 @enderror dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }} ({{ $table->guest_number }}
                                    Guests)</option>
                            @endforeach
                        </select>
                        @error('table_id')
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
