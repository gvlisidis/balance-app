<?php

namespace App\Services;

use App\Actions\ChartsAction;
use App\Enum\CategoryEnum;

class ChartDataBuilder
{
    public ChartsAction $chartsAction;


    public function __construct(ChartsAction $chartsAction)
    {
        $this->chartsAction = $chartsAction;
    }

    public function getChartData(): array
    {
        return [
            'superMarketChartData' => $this->chartsAction->getExpensesForCategory(CategoryEnum::SUPERMARKET->value),
            'fuelChartData' => $this->chartsAction->getExpensesForCategory(CategoryEnum::FUEL->value),
            'amazonChartData' => $this->chartsAction->getExpensesForCategory(CategoryEnum::AMAZON->value),
        ];
    }
}
