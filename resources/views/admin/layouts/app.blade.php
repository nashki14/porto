<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('admin.projects.index') }}">Projects</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </nav>

    <hr>
	
	@if(session('success'))
    <div style="background:#d4edda; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
	@endif

	
    @yield('content')

</body>
</html>
