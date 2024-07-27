@extends('layouts.index')

@section('content')
    <div class="container-form">
        <div class="card-form">
            <h1>Login ke Aplikasi</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ old('username') }}" name="username" placeholder="Masukkan Username"
                        class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="copyright">PT. Smart @2024</p>
        </div>
    </div>
@endsection
