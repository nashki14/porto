<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Muhammad Ikhsan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-slate-950/80 border-b border-white/10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-white font-bold text-lg tracking-wide">
				Muhammad Ikhsan
			</a>
            <nav class="flex gap-8 text-sm">
                <a href="/" class="text-gray-400 hover:text-blue-400 transition">Home</a>
                <a href="/portfolio" class="text-gray-400 hover:text-blue-400 transition">Portfolio</a>
                <a href="/login" class="text-gray-400 hover:text-blue-400 transition">Admin</a>
            </nav>
        </div>
    </header>

    <!-- Content -->
		@yield('content')
        

    <!-- Footer -->
    <footer class="bg-slate-950 border-b border-white/10">
        <div class="max-w-6xl mx-auto px-6 py-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} Muhammad Ikhsan. All rights reserved.
        </div>
    </footer>

</body>
</html>
