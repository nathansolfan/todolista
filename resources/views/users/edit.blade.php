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
        <button type="submit" >Update me</button>

    </form>
</section>