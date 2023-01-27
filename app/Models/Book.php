<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function classification()
    {
        return $this->belongsTo(ClassificationBook::class);
    }

    public function borrowing()
    {
        return $this->hasOne(BorrowingBook::class);
    }

    protected $fillable = [
        'classification_id',
        'name',
        'author',
        'status'
    ];
}
