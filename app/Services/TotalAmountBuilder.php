<?php

namespace App\Services;

use App\Actions\TotalAmountAction;
use App\Enum\CategoryEnum;

class TotalAmountBuilder
{
    public TotalAmountAction $totalAmountAction;

    public function __construct(TotalAmountAction $totalAmountAction)
    {
        $this->totalAmountAction = $totalAmountAction;
    }

    public function getTotalAmounts(): array
    {
        return [
            'superMarketTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::SUPERMARKET->value),
            'amazonTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::AMAZON->value),
            'fuelTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::FUEL->value),
            'energyTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::ENERGY->value),
            'gymnasticsTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::LOVE_ADMIN->value),
            'childcareTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::CHILDCARE->value),
            'clothesTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::CLOTHES->value),
            'bodyshopTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::BODYSHOP->value),
        ];
    }

    public function getAverages(): array
    {
        return [
            'superMarketAvg' =>
                [
                    'name' => 'Supermarket',
                    'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::SUPERMARKET->value)
                ],
            'amazonAvg' => [
                'name' => 'Amazon',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::AMAZON->value)
            ],
            'fuelAvg' => [
                'name' => 'Fuel',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::FUEL->value)
            ],
            'energyAvg' => [
                'name' => 'Energy',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::ENERGY->value)
            ],
            'gymnasticsAvg' => [
                'name' => 'Gymnastics',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::LOVE_ADMIN->value)
            ],
            'childcareAvg' => [
                'name' => 'Childcare',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::CHILDCARE->value)
            ],
            'clothesAvg' => [
                'name' => 'Clothes',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::CLOTHES->value)
            ],
            'bodyshopAvg' => [
                'name' => 'Bodyshop',
                'value' => $this->totalAmountAction->calculateAverageAmount(CategoryEnum::BODYSHOP->value)
            ],
        ];
    }

}
