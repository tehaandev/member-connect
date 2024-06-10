<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to your MemberConnect dashboard!
    </h1>

    <p class="mt-2 text-sm text-gray-600">
        Here you can manage your amenities, members, and more.
    </p>
    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold
    py-2 px-4 rounded duration-300">
        <a href="{{ route('amenities.index') }}">Manage Amenities</a>
    </button>
    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold
    py-2 px-4 rounded duration-300">
        <a href="{{ route('reservations.index') }}">Manage Reservations</a>
    </button>
{{--    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold--}}
{{--    py-2 px-4 rounded duration-300">--}}
{{--        <a href="{{ route('users.index') }}">Manage Users</a>--}}
{{--    </button>--}}
{{--    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold--}}
{{--    py-2 px-4 rounded duration-300">--}}
{{--        <a href="{{ route('roles.index') }}">Manage Roles</a>--}}
{{--    </button>--}}
{{--    <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold--}}
{{--    py-2 px-4 rounded duration-300">--}}
{{--        <a href="{{ route('permissions.index') }}">Manage Permissions</a>--}}
{{--    </button>--}}

</div>
