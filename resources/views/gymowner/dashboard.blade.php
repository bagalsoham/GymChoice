<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Owner Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold">Gym Owner Dashboard</h1>
                    </div>
                    <div class="flex items-center">
                    <form method="POST" action="{{ route('gymowner.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::guard('gymowner')->user()->name }}!</h2>
                        
                        <!-- Dashboard Content -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-indigo-50 p-6 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">Your Gym Details</h3>
                                <p><strong>Email:</strong> {{ Auth::guard('gymowner')->user()->email }}</p>
                                <p><strong>Phone:</strong> {{ Auth::guard('gymowner')->user()->phone }}</p>
                                <p><strong>Address:</strong> {{ Auth::guard('gymowner')->user()->address }}</p>
                            </div>
                            <!-- Add more dashboard widgets here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 