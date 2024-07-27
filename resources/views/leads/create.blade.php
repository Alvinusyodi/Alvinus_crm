@extends('layouts.index')

@section('title', 'Create Lead')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Create Lead</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Masukan nama" class="form-control"
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Masukan email" name="email" class="form-control"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Masukan no HP" name="phone" class="form-control"
                        value="{{ old('phone') }}">
                </div>
                <div class="btn-wrap">
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
