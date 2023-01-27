<?php

namespace App\Http\Controllers;

use App\Enums\BookStatusEnum;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\ClassificationBook;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('name')->get();

        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classificationsBooks = ClassificationBook::orderBy('description')->get();

        return view('book.create', [
            'classifications' => $classificationsBooks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        Book::create($validated);

        return redirect('/books')->with('success', "Livro criado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        if ($book->status !== BookStatusEnum::fromName('AVAILABLE')) {
            return redirect('/books')->with(['warning' => "O livro $book->name está emprestado e não pode ser editado."]);
        }

        $classificationsBooks = ClassificationBook::orderBy('description')->get();

        return view('book.edit', [
            'book' => $book,
            'classifications' => $classificationsBooks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        $book->update($validated);

        return redirect('/books')->with('success', "Livro editado com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->status !== BookStatusEnum::fromName('AVAILABLE')) {
            return redirect('/books')->with(['warning' => "O livro $book->name está emprestado e não pode ser deletado."]);
        }

        $book->delete();

        return redirect('/books')->with('success', "Livro deletado com sucesso.");
    }
}
