<?php

use App\Enums\BorrowingStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowing_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->references('id');
            $table->foreignId('book_id')->constrained('books')->references('id');
            $table->date('devolution');
            $table->enum('status', BorrowingStatusEnum::values());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing_books');
    }
};
