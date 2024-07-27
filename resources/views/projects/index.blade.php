@extends('layouts.index')

@section('title', 'Projects')

@section('content')
    @include('partials.sidebar')
    <main class="main-content">
        @include('partials.header')
        <div class="content-field">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
            @endif
            <h1>Daftar Proyek</h1>
            @if (auth()->user()->role !== 'manager')
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Tambah Proyek Baru</a>
            @endif

            @if ($projects->isEmpty())
                <p class="empty">Belum ada proyek yang dibuat.</p>
            @else
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lead</th>
                            <th>Layanan dipilih</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            @if (!auth()->check() || auth()->user()->role != 'manager')
                                <th colspan="2">Action</th>
                            @else
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $project->lead->name }}</td>
                                <td>{{ $project->product->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->status }}</td>
                                @if (auth()->check() && auth()->user()->role != 'manager')
                                    <td>
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    </td>
                                @endif
                                @if (auth()->check() && auth()->user()->role == 'manager')
                                    <!-- Tombol Approve -->
                                    <td>
                                        <!-- Tombol Approve -->
                                        <form action="{{ route('admin.projects.approve', $project->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>

                                        <!-- Tombol Reject -->
                                        <form action="{{ route('admin.projects.reject', $project->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
@endsection
