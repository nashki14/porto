@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<h2 class="text-3xl font-bold mb-6">Projects</h2>

@if($projects->count())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($projects as $project)
            <div class="bg-white shadow rounded p-4">
                <h3 class="font-bold text-xl">{{ $project->title }}</h3>
                <p class="mt-2 text-sm text-gray-600">
                    {{ $project->description }}
                </p>

                @if($project->tech_stack)
                    <p class="mt-2 text-xs text-blue-600">
                        Tech: {{ $project->tech_stack }}
                    </p>
                @endif
            </div>
        @endforeach
    </div>
@else
    <p>Belum ada project.</p>
@endif
@endsection
