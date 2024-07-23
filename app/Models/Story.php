<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
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

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function views() : HasMany
    {
        return $this->hasMany(View::class);
    }
}
