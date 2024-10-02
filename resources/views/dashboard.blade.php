<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-full
        text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-x-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-dashboard />
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">User Registration</h2>
                    <x-user-chart
                        :user-data="$monthlyUserCounts"
                        :user-labels="$monthlyUserLabel"
                    />
                </div>
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">Reservations</h2>
                    <x-reservations-chart
                        :data="$monthlyReservationsCount"
                        :labels="$monthlyReservationLabel"
                    />
                </div>
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">Busiest Amenities</h2>
                    <x-amenity-chart
                        :data="$reservationsByAmenityCount"
                        :labels="$reservationsByAmenityLabel"
                    />
                </div>


            </div>
        </div>

    </div>
</x-app-layout>
