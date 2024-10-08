<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Update your to do list</h1>
        <form action=" {{ route('tasks.update', $task->id)}}" method="POST">
            @csrf
            @method('PUT') <!-- Spoofing the PUT request method -->

            <div>
                <label for="">Title</label>
                <input type="text" name="title" id="title" value=" {{old('title', $task->title)}} " required>
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" id="description" name="description" value=" {{old('description', $task->description)}} " required>
            </div>
            <div>
                <label for="">Priority</label>
                <input type="text" id="priority" name="priority" value=" {{ old('priority', $task->priority) }} " required>
                <select name="priority" id="priority" required>
                    <option value="low">Low</option>
                    <option value="medium" selected>Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <button type="submit">Click me</button>            
        </form>
    </section>
</body>
</html>