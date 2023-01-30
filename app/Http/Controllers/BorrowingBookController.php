<?php

namespace App\Http\Controllers;

use App\Enums\BookStatusEnum;
use App\Enums\BorrowingStatusEnum;
use App\Http\Requests\StoreBorrowingBookRequest;
use App\Http\Requests\UpdateBorrowingBookRequest;
use App\Models\Book;
use App\Models\BorrowingBook;
use App\Models\User;

class BorrowingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowingBooks = BorrowingBook::all();

        return view('borrowing-books.index', ['borrowings' => $borrowingBooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        $books = Book::where('status', BookStatusEnum::fromName('AVAILABLE'))
            ->orderBy('name')
            ->get();

        return view('borrowing-books.create', [
            'users' => $users,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowingBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowingBookRequest $request)
    {
        $validated = $request->validated();

        BorrowingBook::create($validated);

        return redirect('/borrowing-books')->with('success', "Empréstimo realizado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowingBook $borrowingBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowingBook $borrowingBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowingBookRequest  $request
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowingBookRequest $request, BorrowingBook $borrowingBook)
    {
        $validated = $request->validated();

        if ($validated['status'] === BorrowingStatusEnum::fromName('LATE')) {
            $borrowingBook->status = BorrowingStatusEnum::fromName('LATE');
        }

        if ($validated['status'] === BorrowingStatusEnum::fromName('RETURNED')) {
            $borrowingBook->status = BorrowingStatusEnum::fromName('RETURNED');
        }

        $borrowingBook->save();

        return redirect('/borrowing-books')->with('success', "Empréstimo atualizado com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowingBook $borrowingBook)
    {
        //
    }
}
