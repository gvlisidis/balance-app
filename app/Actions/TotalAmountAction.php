<?php

namespace App\Actions;

use App\Models\Category;
use App\Models\Expense;

class TotalAmountAction
{
    public array $filters = [];

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function getCategoryTotal(string $category)
    {
        return Expense::with('category')
            ->when($this->filters['month'] < 13, function ($query) {
                $query->whereMonth('issued_at', $this->filters['month'] + 1);
            })
            ->whereYear('issued_at', $this->filters['year'])
            ->where('category_id',
                Category::query()->where('name', 'LIKE', $category)->first()->id)
            ->sum('amount');
    }

    public function calculateAverageAmount(string $category): float
    {
        return (Expense::with('category')
            ->whereYear('issued_at', $this->filters['year'])
            ->where('category_id',
                Category::query()->where('name', 'LIKE', $category)->first()->id)
            ->sum('amount') / 100)/ (now()->month - 1);
    }
}
