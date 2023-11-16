@extends('layouts.app')

@section('content')
{{-- start ROW --}}

<div class="row">

    {{-- start table book --}}
    <div class="col-lg-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-primary font-weight-bold">{{ $title }}</h1>
            <a href="{{ route('book.index') }}" class="d-none d-sm-inline-block btn btn-dark btn-sm btn-default shadow-sm">
                Kembali
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('book.update', ['book' => $book->getKey()]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title-input">Judul Buku <span class="text-small text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title-input" value="{{ old('title', $book->title) }}" >
                        @error('title')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if (auth()->user()->role == 'admin')
                    <div class="form-group">
                        <label for="author-input" class="form-label mt-4">Pilih Author <span
                                class="text-small text-danger">*</span></label>
                        <select name="author" id="author"
                            class="form-select"  @error('author') is-invalid @enderror">
                            <option value="-">Pilih Author</option>
                            @foreach ($authors as $item)
                                <option value="{{$item->id}}" @selected(old('author', $item->id == $book->author_id))>{{ str($item->name)->title() }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        
                    @else
                    <div class="form-group">
                        <input type="hidden" name="author" value="{{ $author->id }}">
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary mt-4">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    {{-- END table book --}}
</div>
{{-- END ROW --}}
@endsection
