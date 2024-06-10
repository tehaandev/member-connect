<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight w-full
        text-center">
            {{ __('Create New Amenity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg
            mx-auto w-3/5">
                <form action="{{ route('amenities.store') }}"
                      method="POST"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <x-label for="name">
                            Name
                        </x-label>
                        <x-input
                                id="name" type="text" placeholder="Name"
                                name="name"/>
                    </div>
                    @error('name')
                    <p class="text-red-600 text-xs italic">{{ $message
                        }}</p>
                    @enderror
                    <div class="mb-6">
                        <x-label for="description">
                            Description
                        </x-label>
                        <x-text-area class="shadow appearance-none
                        border
                        rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                     id="description" name="description"
                                     placeholder="Description">
                        </x-text-area>
                    </div>
                    @error('description')
                    <p class="text-red-600 text-xs italic">{{ $message
                        }}</p>
                    @enderror
                    <div class="mb-6">
                        <x-label for="is_available">
                            Is Available
                        </x-label>
                        <input type="checkbox" name="is_available"
                                 id="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}/>
                    </div>
                    <div class="flex items-center justify-start space-x-2">
                        <button
                                class="bg-blue-500 hover:bg-blue-700 duration-300
                                text-white
                            font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                            Create
                        </button>
                        <a href="{{ route('amenities.index') }}"
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
