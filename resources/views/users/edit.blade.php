<section>
    <form action=" {{route('tasks.update')}} " method="POST">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password" id="password">
        </div>

    </form>
</section>