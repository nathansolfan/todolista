<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Create your Form</h1>
        <form action=" {{ route('tasks.store')}}" method="POST">
            @csrf
            <div>
                <label for="">Title</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" id="description" name="description" required>
            </div>
            <button type="submit">Click me</button>            
        </form>
    </section>
</body>
</html>