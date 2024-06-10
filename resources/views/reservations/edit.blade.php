<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-full
        text-center">
            {{ __('Edit Reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User ID</label>
                        <input type="text" name="user_id" id="user_id" value="{{ $reservation->user_id }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="amenity_id" class="block text
                        -gray-700 text-sm font-bold mb-2">Amenity ID</label>
                        <input type="text" name="amenity_id" id="amenity_id" value="{{ $reservation->amenity_id }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                        <input type="date" name="date" id="date" value="{{ $reservation->date }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-start space-x-2">
                        <button
                                class="bg-blue-500 hover:bg-blue-700 duration-300
                                text-white
                            font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                            Update
                        </button>
                        <a href="{{ route('reservations.index') }}"
                           class="bg-red-500 hover:bg-red-700 text-white duration-300
                            font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>