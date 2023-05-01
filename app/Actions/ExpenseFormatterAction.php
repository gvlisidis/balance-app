<?php

namespace App\Actions;

use App\Enum\CategoryEnum;
use App\Models\Category;
use App\Models\Keyword;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;

class ExpenseFormatterAction
{
    public function formatDate($expenseDate): string
    {
        return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($expenseDate))->format('Y-m-d');
    }

    public function assignCategory(string $label): int
    {
        logger()->info('label: ' . $label . ' , ');
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
