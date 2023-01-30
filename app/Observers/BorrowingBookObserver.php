<?php

namespace App\Observers;

use App\Enums\BookStatusEnum;
use App\Enums\BorrowingStatusEnum;
use App\Models\Book;
use App\Models\BorrowingBook;

class BorrowingBookObserver
{
    public function creating(BorrowingBook $borrowingBook)
    {
        $borrowingBook->status = BorrowingStatusEnum::fromName('OPEN');
    }

    /**
     * Handle the BorrowingBook "created" event.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return void
     */
    public function created(BorrowingBook $borrowingBook)
    {
        $bookId = $borrowingBook->book_id;
        $book = Book::where('id', $bookId)->first();
        $book->status = BookStatusEnum::fromName('BORROWED');
        $book->save();
    }

    /**
     * Handle the BorrowingBook "updated" event.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return void
     */
    public function updated(BorrowingBook $borrowingBook)
    {
        if ($borrowingBook->status === BorrowingStatusEnum::fromName('RETURNED')) {
            $bookId = $borrowingBook->book_id;
            $book = Book::where('id', $bookId)->first();
            $book->status = BookStatusEnum::fromName('AVAILABLE');
            $book->save();
        }
    }

    /**
     * Handle the BorrowingBook "deleted" event.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return void
     */
    public function deleted(BorrowingBook $borrowingBook)
    {
        //
    }

    /**
     * Handle the BorrowingBook "restored" event.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return void
     */
    public function restored(BorrowingBook $borrowingBook)
    {
        //
    }

    /**
     * Handle the BorrowingBook "force deleted" event.
     *
     * @param  \App\Models\BorrowingBook  $borrowingBook
     * @return void
     */
    public function forceDeleted(BorrowingBook $borrowingBook)
    {
        //
    }
}
