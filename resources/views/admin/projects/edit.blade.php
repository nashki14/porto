@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="p-8 bg-slate-100 min-h-screen">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            Edit Project
        </h1>
        <p class="text-slate-500">
            Update informasi project portfolio
        </p>
    </div>

    <!-- Card Form -->
    <div class="bg-white p-8 rounded-xl shadow-sm border max-w-2xl">

        <form action="{{ route('admin.projects.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Project Title
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $project->title) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       required>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Description
                </label>
                <textarea name="description"
                          rows="4"
                          class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                          required>{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Status
                </label>
                <select name="status"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="draft" {{ $project->status == 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>
                    <option value="published" {{ $project->status == 'published' ? 'selected' : '' }}>
                        Published
                    </option>
                </select>
            </div>

            <!-- Image -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Project Image
                </label>

                @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}"
                         class="w-40 rounded-lg mb-3 shadow">
                @endif

                <input type="file"
                       name="image"
                       class="w-full border rounded-lg px-4 py-3 bg-white">
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow transition">
                    Update Project
                </button>

                <a href="{{ route('admin.projects.index') }}"
                   class="px-6 py-3 border rounded-lg hover:bg-slate-50 transition">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>
@endsection
