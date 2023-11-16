@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>{{ $title }}</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="{{ route('book.create') }}" role="button">Buat Buku</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>
                                <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
