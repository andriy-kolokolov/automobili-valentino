<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
    ];

    public function story() : BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}
