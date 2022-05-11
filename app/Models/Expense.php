<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const DEBIT = 1;
    const CREDIT = 2;

    const EXPENSE_TYPE = [
        self::DEBIT => 'debit',
        self::CREDIT => 'credit',
    ];

    protected $casts = [
        'amount' => 'integer',
        'issued_at' => 'date',
    ];

    protected $appends = [
        'formatted_amount',
        'formatted_type'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedAmountAttribute(): string
    {
        return number_format( $this->getAttribute( 'amount' ) / 100, 2 );
    }

    public function setAmountAttribute( $amount ): void
    {
        $this->attributes['amount'] = (float) (abs($amount)) * 100;
    }

    public function getFormattedTypeAttribute(): string
    {
        return Str::ucfirst(self::EXPENSE_TYPE[$this->type]);
    }
}
