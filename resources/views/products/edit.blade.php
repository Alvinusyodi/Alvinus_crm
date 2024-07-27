@extends('layouts.index')

@section('title', 'Edit Product')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Edit Product</h1>
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <textarea id="description" name="description" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01"
                        required>
                </div>
                <div class="btn-wrap">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
