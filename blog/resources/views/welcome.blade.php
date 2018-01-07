<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
</head>
<body>
    @foreach($tasks as $task)
        <li>Hello {{ $task->body }}!</li>
    @endforeach
</body>
</html>