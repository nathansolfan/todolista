<x-layout>
    

    @foreach ( $users as $user)
    <p> {{ $user->name}} </p>
    <p> {{ $user->email}} </p> 
        
    @endforeach
    
</x-layout>
