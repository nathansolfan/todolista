<x-layout>
    
    @if (session('success_create'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success_create') }}
    </div>
@endif

@if (session('success_update'))
    <div class="bg-blue-500 text-white p-4 rounded mb-4">
        {{ session('success_update') }}
    </div>
@endif

    <div class="flex justify-center items-center mb-4">
        <a href=" {{ route('users.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</a>
        <a href=" {{ route('tasks.index')}}" class=" bg-gray-500 text-white px-4 py-2 rounded ">Homepage</a>
    </div>

    <div class="grid gap-6">
        @foreach ($users as $user)
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <p class="text-xl font-semibold">{{ $user->name }}</p>
            <p class="text-gray-600 ">{{ $user->email }}</p>
            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline mt-2 block">Show me</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500" >Delete User</button>
            </form>
        </div>
        @endforeach
    </div>
    
</x-layout>
