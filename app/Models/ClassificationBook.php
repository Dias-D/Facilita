<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassificationBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected $fillable = [
        'classification'
    ];
}
