<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'writer',
        'publisher',
        'year',
        'available',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
