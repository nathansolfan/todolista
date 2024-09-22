<x-layout>
    <a href=" {{ route('users.create')}} ">Create User</a>
    

    @foreach ( $users as $user)
    <div>
        <p> {{ $user->name}} </p>
        <p> {{ $user->email}} </p>
    </div>
    <a href=" {{ route('users.show', $user->id)}} "> Show me </a>        
    @endforeach
    
</x-layout>
