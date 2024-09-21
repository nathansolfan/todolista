<!-- resources/views/welcome.blade.php -->
<x-layout>
    {{-- Success message --}}
    @if (session('success'))
        <div class="text-green-500">
            {{ session('success') }}
        </div>        
    @endif

    {{-- Filter Links: Placed above the task list --}}
    <div class="mb-4 flex items-center justify-center">
        <a href="{{ route('tasks.index', ['priority' => 'high']) }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Show High Priority</a>
        <a href="{{ route('tasks.index', ['priority' => 'medium']) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Show Medium Priority</a>
        <a href="{{ route('tasks.index', ['priority' => 'low']) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Show Low Priority</a>
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Show All</a>
    </div>

    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">T O D O  L I S T</h1>
            
            <div class="flex justify-center mb-6">
                <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create New Task
                </a>
            </div>

            <div class="grid gap-6">
                @foreach ($tasks as $task)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                            <h2 class="text-2xl font-semibold text-gray-800">{{ $task->title }}</h2>
                            <p class="text-gray-600 mt-2">{{ $task->description }}</p>
                        </div>

                        <div class="mt-4 flex space-x-4">
                            {{-- Toggle completed status form --}}
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="completed" value="{{ $task->completed ? 0 : 1 }}">
                                <button type="submit" class="text-indigo-500 hover:underline">
                                    {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Completed' }}
                                </button>
                            </form>

                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500 hover:underline">Edit</a>

                            {{-- Delete form --}}
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>

                            {{-- Display priority with colors based on priority --}}
                            <p class="text-lg font-bold {{ $task->priority === 'high' ? 'text-red-500' : ($task->priority === 'medium' ? 'text-yellow-500' : 'text-green-500') }}">
                                Priority: {{ ucfirst($task->priority) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
