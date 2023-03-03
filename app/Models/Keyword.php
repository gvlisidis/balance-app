<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keyword extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'keywords' => 'array',
    ];

    public function expenses(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
