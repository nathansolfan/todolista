

<form action=" {{route('users.store')}} " method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="text" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit">Submit me</button>

</form>