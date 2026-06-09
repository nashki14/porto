@extends('layouts.public')

@section('title', 'Muhammad Ikhsan | Fullstack Developer & Infrastructure Engineer')

@section('content')

<div class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 text-gray-200 overflow-hidden">

    <!-- HERO -->
    <section class="relative py-32 px-6">
        <div class="max-w-6xl mx-auto">

            <p class="text-blue-400 font-medium mb-6 tracking-wide uppercase text-sm">
                Fullstack Developer & Infrastructure Engineer
            </p>

            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-8 bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                I Design & Build High-Performance Systems That Scale
            </h1>

            <p class="text-lg text-gray-400 max-w-3xl leading-relaxed mb-12">
                I help startups, clinics, and growing businesses build secure,
                scalable web applications and stable server infrastructure.
                From backend architecture to deployment and optimization —
                I deliver systems that actually work in production.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="#contact"
                   class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-semibold shadow-lg shadow-blue-600/30 transition">
                    Work With Me
                </a>

                <a href="#projects"
                   class="border border-blue-500/40 px-8 py-3 rounded-lg hover:bg-blue-600/10 transition">
                    View Case Studies
                </a>
            </div>

        </div>
    </section>


    <!-- VALUE PROPOSITION -->
    <section class="py-24 px-6 border-t border-white/5">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-12 text-center">

            <div>
                <h3 class="text-xl font-semibold text-blue-400 mb-4">
                    Business-Oriented Development
                </h3>
                <p class="text-gray-400">
                    I focus on solving operational bottlenecks and improving
                    system reliability — not just delivering code.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-blue-400 mb-4">
                    Infrastructure-Level Thinking
                </h3>
                <p class="text-gray-400">
                    Development + deployment + optimization.
                    Your system is built with production in mind from day one.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-blue-400 mb-4">
                    Long-Term Stability
                </h3>
                <p class="text-gray-400">
                    Clean architecture, scalable structure, and maintainable codebase.
                </p>
            </div>

        </div>
    </section>


    <!-- SERVICES -->
    <section class="py-28 px-6">
        <div class="max-w-6xl mx-auto">

            <h2 class="text-3xl font-bold mb-16 text-white text-center">
                Services
            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach([
                    ['title' => 'Custom Web Application Development',
                     'desc' => 'Laravel-based systems, internal dashboards, POS systems, REST APIs, and workflow automation tools.'],
                    ['title' => 'Server Architecture & Deployment',
                     'desc' => 'Linux server setup, Proxmox virtualization, VM management, performance tuning & production deployment.'],
                    ['title' => 'Database Performance Optimization',
                     'desc' => 'Query refactoring, indexing strategy, load optimization, and system stability improvements.']
                ] as $service)

                <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-2xl hover:border-blue-500/40 transition shadow-xl">
                    <h3 class="text-xl font-semibold text-white mb-4">
                        {{ $service['title'] }}
                    </h3>
                    <p class="text-gray-400">
                        {{ $service['desc'] }}
                    </p>
                </div>

                @endforeach

            </div>
        </div>
    </section>


    <!-- TECH STACK -->
    <section class="py-24 px-6 border-t border-white/5">
        <div class="max-w-6xl mx-auto">

            <h2 class="text-3xl font-bold mb-10 text-white">
                Technology Stack
            </h2>

            <div class="flex flex-wrap gap-4">

                @foreach([
                    'Laravel','PHP','MySQL','Proxmox VE',
                    'Linux','Docker','TailwindCSS','REST API',
                    'Git','Nginx','Virtualization','Database Optimization'
                ] as $tech)

                <span class="bg-blue-900/30 border border-blue-500/30 px-4 py-2 rounded-full text-sm hover:bg-blue-600 hover:text-white transition">
                    {{ $tech }}
                </span>

                @endforeach

            </div>

        </div>
    </section>


    <!-- PROJECTS -->
    <section id="projects" class="py-28 px-6">
        <div class="max-w-6xl mx-auto">

            <h2 class="text-3xl font-bold mb-16 text-white">
                Selected Case Studies
            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach($projects as $project)
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden hover:border-blue-500/40 transition shadow-xl">

                    @if($project->image)
                        <img src="{{ asset('storage/'.$project->image) }}"
                             class="h-48 w-full object-cover">
                    @endif

                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3 text-white">
                            {{ $project->title }}
                        </h3>

                        <p class="text-gray-400 mb-4">
                            {{ \Illuminate\Support\Str::limit($project->description, 120) }}
                        </p>

                        <a href="{{ route('portfolio.show', $project->slug) }}"
                           class="text-blue-400 hover:text-blue-300 font-semibold">
                            View Details →
                        </a>
                    </div>

                </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- CONTACT -->
    <section id="contact" class="py-28 px-6 bg-gradient-to-r from-slate-900 to-blue-950 border-t border-white/5">
        <div class="max-w-4xl mx-auto text-center">

            <h2 class="text-3xl font-bold mb-6 text-white">
                Let’s Build a Reliable System for Your Business
            </h2>

            <p class="text-gray-400 mb-10">
                Available for freelance projects, system architecture consulting,
                and infrastructure setup. Let’s discuss how I can help your business scale.
            </p>

            <div class="flex justify-center gap-6 flex-wrap">

                <a href="mailto:your@email.com"
                   class="bg-blue-600 px-6 py-3 rounded-lg hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition">
                    Contact Me
                </a>

                <a href="https://github.com/yourusername"
                   target="_blank"
                   class="border border-blue-500/40 px-6 py-3 rounded-lg hover:bg-blue-600/20 transition">
                    GitHub
                </a>

                <a href="https://linkedin.com/in/yourusername"
                   target="_blank"
                   class="border border-blue-500/40 px-6 py-3 rounded-lg hover:bg-blue-600/20 transition">
                    LinkedIn
                </a>

            </div>

        </div>
    </section>

</div>

@endsection
