@extends('layouts.index')

@section('title', 'Lead Details')

@section('content')
    <div class="container-form">
        <div class="show-form">
            <h2>Lead Details</h2>
            <div class="box">
                <strong>Name:</strong> {{ $lead->name }}
            </div>
            <div class="box">
                <strong>Email:</strong> {{ $lead->email }}
            </div>
            <div class="box">
                <strong>Phone:</strong> {{ $lead->phone }}
            </div>
            <div class="box">
                <strong>Status:</strong> {{ $lead->status }}
            </div>
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
