<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-full
        text-center">
            {{ __('Create Reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('reservations.store')}}"
                      method="POST"
                      class="p-4"
                      onsubmit="console.log('submitting form')"
                >
                    @csrf
                    <div class="mb-4">
                        <x-label for="user_id">User ID</x-label>
                        @if(Auth::user()->role_id == 2)
                            <x-input
                                disabled
                                type="text" name="user_id" id="user_id"
                                     value="{{ Auth::user()->id }}"
                            />
                        @else
                            <select
                                name="user_id"
                                id="user_id"
                                class="shadow appearance-none border rounded
                                w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif

                    </div>
                    <div class="mb-4">
                        <x-label for="amenity_id" class="block text
                        -gray-700 text-sm font-bold mb-2">Amenity ID
                        </x-label>
                        <select name="amenity_id" id="amenity_id"
                                class="shadow appearance-none border rounded
                                w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach($amenities as $amenity)
                                <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-label for="date" class="block text-gray-700 text-sm
                         font-bold mb-2">Date
                        </x-label>
                        <x-input type="date" name="date" id="date"
                                 min="{{ date('Y-m-d') }}"
                                 class="shadow appearance-none border rounded
                               w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            {{--                        // create reservation on click --}}
                        >
                            Create
                        </button>
                        <a href="{{ route('reservations.index') }}"
                           class="bg-red-500 hover:bg-red-700 text-white duration-300
                            font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </a>
                    </div>
                </form>

                @if(Auth::user()->role_id == 2)
                    <h1 class="text-center text-2xl font-bold my-5">Your Reservations</h1>
                    <table class="table-auto w-full m-3">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Amenity ID</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservationsByUser as $reservation)
                            <tr>
                                <td class="border px-4 py-2">{{ $reservation->id }}</td>
                                <td class="border px-4 py-2">{{ $reservation->amenity_id }}</td>
                                <td class="border px-4 py-2">{{ $reservation->date }}</td>
                                <td class="border px-4 py-2 flex justify-center">
                                    <a href="{{ route('reservations.edit', $reservation->id) }}"
                                       class="text-blue-500 hover:text-blue-900
                                                     duration-300
                                         text-center font-bold px-4 py-2
                                         rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500
                                                hover:text-red-700
                                                        duration-300
                                                 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const today = new Date();
            const nextYear = new Date();
            nextYear.setFullYear(today.getFullYear() + 1);

            const formatDate = (date) => {
                const d = new Date(date);
                let month = '' + (d.getMonth() + 1);
                let day = '' + d.getDate();
                const year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            };

            dateInput.min = formatDate(today);
            dateInput.max = formatDate(nextYear);
        });
    </script>
</x-app-layout>
