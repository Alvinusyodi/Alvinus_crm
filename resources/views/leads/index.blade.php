@extends('layouts.index')

@section('title', 'Leads')

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

            @if (auth()->user()->role !== 'manager')
                <a href="{{ route('leads.create') }}" class="btn btn-primary">Tambah Lead</a>
            @endif

            @if ($leads->isEmpty())
                <div class="empty">Tidak ada leads yang tersedia.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            @if (auth()->user()->role !== 'manager')
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($leads as $lead)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->status }}</td>
                                @if (auth()->user()->role !== 'manager')
                                    <td>
                                        <a href="{{ route('leads.show', $lead) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('leads.destroy', $lead) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
