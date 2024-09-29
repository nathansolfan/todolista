<x-layout>
    <div class="mb-8 max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mb-4">User Details</h1>

        <div class="mb-6">
            <p class="text-gray-700 font-semibold text-lg">ID: <span class="text-gray-900">{{ $user->id }}</span></p>
            <p class="text-gray-700 font-semibold text-lg">Name: <span class="text-gray-900">{{ $user->name }}</span></p>
            <p class="text-gray-700 font-semibold text-lg">Email: <span class="text-gray-900">{{ $user->email }}</span></p>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit me</a>
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Go Back</a>
            <a href="{{ route('users.index')}}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" >Home</a>
        </div>
    </div>
</x-layout>
