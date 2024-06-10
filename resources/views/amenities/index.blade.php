<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-full
        text-center">
            {{ __('Amenities') }}
            <div class="mt-4">
                <a class="px-2 py-1 text-sm text-green-600 border-2
                    duration-300 hover:duration-300
                    border-green-600 rounded-md hover:bg-green-600
                    hover:text-white"
                    href="{{route('amenities.create')}}">
                Add New Amenity
                </a>
            </div>


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($amenities as $amenity)
                        <tr>
                            <td class="border px-4 py-2">{{ $amenity->id }}</td>
                            <td class="border px-4 py-2">{{ $amenity->name }}</td>
                            <td class="border px-4 py-2">{{ $amenity->description }}</td>
                            <td class="border px-4 py-2 flex justify-center">
                                <a href="{{ route('amenities.edit', $amenity->id) }}"
                                   class="text-blue-500 hover:text-blue-900
                                                    duration-300
                                        text-center font-bold px-4 py-2
                                        rounded">
                                    Edit
                                </a>
                                <form action="{{ route('amenities.destroy', $amenity) }}"
                                      method="POST"
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
                    </tbody>
                </table>
                <div class="my-4">
                    {{$amenities->links()}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
