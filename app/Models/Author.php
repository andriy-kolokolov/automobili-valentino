<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'bio',
        'social_links',
        'is_active',
    ];

    public function stories() : HasMany
    {
        return $this->hasMany(Story::class);
    }
}
