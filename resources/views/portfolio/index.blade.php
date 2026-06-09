<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- HEADER -->
    <header class="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
		<div class="max-w-6xl mx-auto px-6 py-16">
			<h1 class="text-4xl md:text-5xl font-bold leading-tight">
				Muhammad Ikhsan
			</h1>
			<p class="mt-4 text-lg text-gray-300 max-w-2xl">
				System Engineer & Fullstack Developer.
				Experienced in server infrastructure, Proxmox virtualization,
				and web application development.
			</p>
		</div>
	</header>


    <!-- CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
				<a href="{{ route('portfolio.show', $project->slug) }}"
					class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">

			@if($project->image)
				<div class="overflow-hidden">
					<img src="{{ asset('storage/'.$project->image) }}"
						class="h-52 w-full object-cover group-hover:scale-105 transition duration-500">
				</div>
			@endif

				<div class="p-6">
					<h3 class="text-xl font-semibold group-hover:text-blue-600 transition">
						{{ $project->title }}
					</h3>

				<p class="text-gray-600 text-sm mt-3 line-clamp-3">
						{{ $project->description }}
				</p>

				<span class="inline-block mt-4 text-sm text-blue-600 font-medium">
						View Project →
				</span>
				</div>
				</a>

			@endforeach

        </div>

        @if($projects->isEmpty())
            <p class="text-center text-gray-500">
                No projects yet.
            </p>
        @endif
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-6 text-sm text-gray-500">
        © {{ date('Y') }} My Portfolio
    </footer>

</body>
</html>
