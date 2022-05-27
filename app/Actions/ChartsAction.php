<?php

namespace App\Actions;

use App\Models\Category;
use App\Models\Expense;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ChartsAction
{

    public array $filters = [];
    public $colors = [
        'January' => '#f6ad55',
        'February' => '#fc8181',
        'March' => '#90cdf4',
        'April' => '#66DA26',
        'May' => '#cbd5e0',
        'June' => '#cbd5e0',
        'July' => '#fc8181',
        'August' => '#90cdf4',
        'September' => '#66DA26',
        'October' => '#f6ad55',
        'November' => '#cbd5e0',
        'December' => '#90cdf4',
    ];

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function getExpensesForCategory(string $category): Collection
    {
        $expenses = Expense::with('category')
            ->where('category_id',
                Category::query()->where('name', 'LIKE', $category)->first()->id)
            ->whereYear('issued_at', $this->filters['year'])->get();

        return $expenses->isNotEmpty() ? $expenses : collect();
    }

    public function getExpensesForCharts(Collection $collection, string $title)
    {
        return $collection->groupBy(function ($item) {
            return Carbon::parse($item->issued_at)->format('m');
        })
            ->reverse()
            ->reduce(function ($columnChartModel, $data) {
                $type = $data->first()->issued_at->format('F');
                $value = $data->sum('amount') / 100;
                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle($title)
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled(true)
                ->setColumnWidth(60)
                ->withoutGrid()
            );
    }


}
