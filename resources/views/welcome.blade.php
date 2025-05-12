<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>PromptForge AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <div class="min-h-screen flex flex-col justify-between">
        <!-- Top Nav -->
        <header class="bg-white shadow p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold text-indigo-600">🔮 PromptForge AI</h1>
                <div class="space-x-3">
                @auth
    <a href="{{ url('/admin') }}" class="text-indigo-600 hover:underline">Dashboard</a>
@else
    <a href="{{ url('/admin/login') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Login</a>
    {{-- <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Register</a> --}}
@endauth

                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-grow">
            <div class="max-w-4xl mx-auto text-center py-20 px-4">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Your Everyday AI Toolkit</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Supercharge your productivity with AI-powered tools for personal finance, fitness, learning, creativity and more.
                </p>

                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-indigo-700">
                    Try It Now
                </a>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow py-6 mt-10">
            <div class="max-w-7xl mx-auto text-center text-sm text-gray-500">
                © {{ date('Y') }} PromptForge AI — Built with Laravel & Filament. Developed by <strong><em>Leonard Makafui</em></strong>.
            </div>
        </footer>
    </div>
</body>
</html>
