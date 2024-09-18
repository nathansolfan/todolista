<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>{{$task->title}}</p>
    <p>{{$task->description}} </p>
    <a href=" {{ route('tasks.edit', $task->id)}}">Edit me</a>
    <button type="">Delete me</button>
</body>
</html>