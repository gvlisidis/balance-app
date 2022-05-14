<?php

namespace App\Actions;

use App\Enum\CategoryEnum;
use App\Models\Category;
use App\Models\Keyword;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ExpenseFormatterAction
{
    public function formatDate($expenseDate): string
    {
        return Carbon::createFromFormat('d/m/Y', $expenseDate)->format('Y-m-d');
    }

    public function assignCategory(string $label): int
    {
        $keywords = Keyword::all();

        foreach ($keywords as $keywordItem) {
                if (Str::contains(Str::lower($label), $keywordItem->keywords)) {
                    return $keywordItem->category_id;
                }
            }

        return Category::query()->where('name', 'LIKE', CategoryEnum::UNCATEGORIZED->value)->first()->id;
    }

    public function formatAmount($amount): int
    {
        logger()->info($amount . ' , ');
        return abs($amount) * 100;
    }
}
