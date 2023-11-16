@extends('layouts.app')

@section('content')
{{-- start ROW --}}

<div class="row">

    {{-- start table Warehouse --}}
    <div class="col-lg-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-primary font-weight-bold">{{ $title }}</h1>
            <a href="{{ route('user.index') }}" class="d-none d-sm-inline-block btn btn-dark btn-sm btn-default shadow-sm">
                Kembali
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('storeResetPassword', ['user' => $user->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="password-input" class="form-label mt-4">Password Baru <span class="text-small text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password-input" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-input" class="form-label mt-4">Confirmasi Password Baru <span class="text-small text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            id="password-input" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    {{-- END table Warehouse --}}
</div>
{{-- END ROW --}}
@endsection
