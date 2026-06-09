@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<div class="p-8 bg-slate-100 min-h-screen">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Manage Projects
            </h1>
            <p class="text-slate-500">
                Kelola semua project portfolio Anda
            </p>
        </div>

        <a href="{{ route('admin.projects.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg shadow transition">
            + Add Project
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

        <table class="w-full text-left">
            <thead class="bg-slate-50 border-b">
                <tr>
                    <th class="p-4 text-sm font-semibold text-slate-600">#</th>
                    <th class="p-4 text-sm font-semibold text-slate-600">Title</th>
                    <th class="p-4 text-sm font-semibold text-slate-600">Status</th>
                    <th class="p-4 text-sm font-semibold text-slate-600 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($projects as $index => $project)
                <tr class="border-b hover:bg-slate-50 transition">
                    <td class="p-4 text-slate-500">
                        {{ $index + 1 }}
                    </td>

                    <td class="p-4 font-medium text-slate-800">
                        {{ $project->title }}
                    </td>

                    <td class="p-4">
                        @if($project->status == 'published')
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-600 rounded-full">
                                Published
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">
                                Draft
                            </span>
                        @endif
                    </td>

                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                           class="text-indigo-600 hover:underline text-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.projects.destroy', $project->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Yakin hapus project ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-slate-500">
                        Belum ada project.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
@endsection
