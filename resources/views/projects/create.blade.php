<!-- resources/views/projects/create.blade.php -->

@extends('layouts.index')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Tambah Proyek Baru</h1>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="select-container">
                        <select name="lead_id" id="lead_id" class="form-control">
                            <option value="Pilih Lead" disabled selected>Pilih Lead</option>
                            @foreach ($leads as $lead)
                                <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select-container">
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="" disabled selected>Pilih Layanan</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="description" placeholder="Deskripsi" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>
                <div class="btn-wrap">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
