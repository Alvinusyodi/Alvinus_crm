@extends('layouts.index')

@section('title', 'Create Product')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Nama layanan" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <textarea id="description" placeholder="Deskripsi layanan" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <input type="number" id="price" placeholder="Harga" name="price" step="0.01" required>
                </div>
                <div class="btn-wrap">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
