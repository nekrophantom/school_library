@extends('layouts.auth')

@section('title', 'Log In')

@section('content')
    <div class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('auth') }}">
            @csrf
            <span class="text-center">
                <h1 class="h3 mb-3 fw-normal">LOGIN</h1>
            </span>
            <p class="text-secondary tagline" >Please sign in</p>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" name="email" autocomplete="off"
                    placeholder="do-not-remove@this.com">
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="do-not-remove-this">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" name="remember">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <span class="text-center">
                <p class="mt-5 mb-3 text-body-secondary">&copy; {{ config('app.name') }} {{ date('Y') }}</p>
            </span>
        </form>
    </div>
    
@endsection
