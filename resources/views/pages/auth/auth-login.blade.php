@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success font-medium text-sm" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control
                        @error('email') is-invalid @enderror" name="email"
                        tabindex="1" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password"
                        class="form-control
                    @error('password') is-invalid @enderror" name="password"
                        tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $messasge }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="text-small">
                        Forgot Password?
                    </a>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
