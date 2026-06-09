<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">

        <div class="p-6 border-b border-slate-800">
            <h1 class="text-xl font-bold">Ikhsan Admin</h1>
            <p class="text-xs text-slate-400">Portfolio CMS</p>
        </div>

        <nav class="flex-1 p-4 space-y-2 text-sm">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800 transition">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-slate-800 transition">
                📁 Projects
            </a>

        </nav>

        <div class="p-4 border-t border-slate-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    🚪 Logout
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow-sm border-b px-8 py-4 flex justify-between items-center">
            <h2 class="font-semibold text-slate-700">
                @yield('title')
            </h2>

            <div class="text-sm text-slate-500">
                Welcome, Muhammad Ikhsan 👋
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <main class="p-8">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
