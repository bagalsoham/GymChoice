<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Owner Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-semibold">Gym Owner Dashboard</span>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('gymowner.logout') }}" class="text-gray-700 hover:text-gray-900">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 p-4">
                <h2 class="text-2xl font-bold mb-4">Welcome to Your Dashboard</h2>
                <p class="text-gray-600">This is your gym management dashboard. You can manage your gym details, members, and more from here.</p>
            </div>
        </div>
    </div>
</body>
</html> 