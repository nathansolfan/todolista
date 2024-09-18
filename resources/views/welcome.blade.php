<x-layout>

    <h1>T O D O  L I S T</h1>
    <!-- <a href="/create">Click me</a> -->
    <a href=" {{ route('tasks.create')}} ">Create</a>
    {{-- <a href=" {{ route('tasks.show')}} ">Show me</a> --}}
    <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>

    @foreach ( $tasks as $task )
    <p>{{$task->title}}</p>
    <p>{{$task->description}}</p>
    <a href=" {{ route('tasks.show', $task->id)}} ">Show task</a>        
    @endforeach

</x-layout>