    <x-layout>
        <p> {{ $user->name}} </p>
        <p> {{ $user->email}} </p>

        <a href="{{ url()->previous() }}">Go Back</a>
    </x-layout>