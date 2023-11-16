<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Buku';
        $data['books'] = Book::all();
        return view('book.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Buat Buku';
        if(auth()->user()->role == User::ROLE_ADMIN){
            $data['author'] = Author::all();
        } else {
            $data['author'] = auth()->user();
        }
        return view('book.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $book                       = new Book();
            $book->title                = $request->title;
            $book->author_id            = $request->author;
            $book->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('book.create')->withInput()->withToastError("Ups! Gagal Tambah Buku!" . $th->getMessage());
        }
        return redirect()->route('book.index')->withToastSuccess("Tambah Buku Berhasil!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $title = 'Ubah Buku';
        if(auth()->user()->role == User::ROLE_ADMIN){
            $authors = Author::all();
        } else {
            $authors = auth()->user();
        }
        return view('book.edit', compact('book', 'title', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        DB::beginTransaction();
        try {

            $book->title                = $request->title;
            $book->author_id            = $request->author;
            $book->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('book.edit', ['book' => $book->getKey()])->withInput()->withToastError("Ups! Gagal Ubah Buku!" . $th->getMessage());
        }
        return redirect()->route('book.index')->withToastSuccess("Berhasil Ubah Buku!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        DB::beginTransaction();
        try {

            $book->delete();
            DB::commit();

            return redirect()->route('book.index')->withToastSuccess('Berhasil Hapus Buku!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('book.index')->withToastSuccess('Gagal Ubah Buku!');
        } 
    }
}
