@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>{{ $title }}</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="{{ route('user.create') }}" role="button">Buat Pengguna</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                
                                <a href="{{ route('viewResetPassword', ['user' => $user->id]) }}" class="btn btn-info">Reset Password</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
