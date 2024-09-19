<!-- resources/views/welcome.blade.php -->
<x-layout>
    {{-- success msg --}}
    @if (session('success'))
    <div class="text-green-500">
        {{ session('success')}}
    </div>        
    @endif

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
                      <h2 class="text-2xl font-semibold text-gray-800">{{ $task->title }}</h2>
                      <p class="text-gray-600 mt-2">{{ $task->description }}</p>

                      <div class="mt-4 flex space-x-4">
                          <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">View</a>
                          <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500 hover:underline">Edit</a>
                          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-500 hover:underline">Delete</button>
                          </form>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</x-layout>
