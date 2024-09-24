@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section>
    <form action=" {{route('users.update', $user->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" id="name" value=" {{old('name', $user->name)}} ">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" id="email" value=" {{old('email', $user->email)}} ">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password" id="password">
        </div>
        <div>
            <label for="">Confirm Password</label>
            <input type="text" name="password_confirmation" id="password_confirmation">
        </div>
        <button type="submit" >Update me</button>

    </form>
</section>