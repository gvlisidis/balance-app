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
        'January' => '#1D4ED8',
        'February' => '#A21CAF',
        'March' => '#C2410C',
        'April' => '#4D7C0F',
        'May' => '#CD5C5C',
        'June' => '#1D4ED8',
        'July' => '#881337',
        'August' => '#1E293B',
        'September' => '#134E4A',
        'October' => '#404040',
        'November' => '#A21CAF',
        'December' => '#701A75',
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
                ->setColumnWidth(70)
                ->withoutGrid()
            );
    }


}
