<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
