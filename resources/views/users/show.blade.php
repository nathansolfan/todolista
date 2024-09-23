    <x-layout>
        <p> {{ $user->name}} </p>
        <p> {{ $user->email}} </p>
        <a href=" {{route('users.edit', $user->id)}} ">Edit me</a>

        <a href="{{ url()->previous() }}">Go Back</a>
    </x-layout>