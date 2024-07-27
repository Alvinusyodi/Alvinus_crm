@extends('layouts.index')

@section('title', 'Products')

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
                <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Product</a>
            @endif
            @if ($products->isEmpty())
                <div class="empty">Tidak ada produk yang tersedia.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            @if (auth()->user()->role !== 'manager')
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                @if (auth()->user()->role !== 'manager')
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
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
