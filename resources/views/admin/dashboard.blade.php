<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
</head>
<body>
    <h2>Admin dashboard</h2>
    <p>Welcome</p>
    <form method="GET" action="{{ route('admin.logout') }}">
    @csrf
    @method('POST')
    <button type="submit">Logout</button>
</form>
</body>
</html>