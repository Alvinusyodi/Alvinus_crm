@extends('layouts.index')

@section('title', 'Edit Lead')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Perbaharui Data</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('leads.update', $lead) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{ $lead->name }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{ $lead->email }}">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" value="{{ $lead->phone }}">
                </div>
                <div class="btn-wrap">
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
