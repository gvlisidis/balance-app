<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function keyword(): HasOne
    {
        return $this->hasOne(Keyword::class);
    }
}
