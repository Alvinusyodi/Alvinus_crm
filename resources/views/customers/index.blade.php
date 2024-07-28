@extends('layouts.index')

@section('title', 'Customers')

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

            @if ($customers->isEmpty())
                <div class="empty">Tidak ada customers yang tersedia.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Layanan</th>
                            <th>Tanggal Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $customer->lead ? $customer->lead->name : 'N/A' }}</td>
                                <td>{{ $customer->lead ? $customer->lead->email : 'N/A' }}</td>
                                <td>{{ $customer->lead ? $customer->lead->phone : 'N/A' }}</td>
                                <td>{{ $customer->product ? $customer->product->name : 'N/A' }}</td>
                                <td>{{ $customer->created_at->format('d M Y') }}</td>
                                <td>
                                    @unless (auth()->user()->role == 'manager')
                                        <a href="{{ route('customers.edit', $customer->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    @endunless
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
@endsection
