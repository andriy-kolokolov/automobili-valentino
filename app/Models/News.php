<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'views_count',
        'is_hidden',
        'image_path',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
