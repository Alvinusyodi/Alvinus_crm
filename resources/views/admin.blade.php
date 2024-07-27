@extends('layouts.index')

@section('content')
    @include('partials.sidebar')
    <main class="main-content">
        @include('partials.header')

        <div class="content-field">
            <h1>Dashboard</h1>
            @include('partials.card')
        </div>
    </main>
@endsection
