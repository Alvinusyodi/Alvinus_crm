<!-- resources/views/projects/edit.blade.php -->

@extends('layouts.index')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Edit Proyek</h1>
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="lead_id">Nama Lead</label>
                    <select name="lead_id" id="lead_id" class="form-control">
                        @foreach ($leads as $lead)
                            <option value="{{ $lead->id }}" {{ $lead->id == $project->lead_id ? 'selected' : '' }}>
                                {{ $lead->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Layanan</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ $product->id == $project->product_id ? 'selected' : '' }}>
                                {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $project->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
