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
            'kaliaTotal' => $this->totalAmountAction->getCategoryTotal(CategoryEnum::KALIA->value),
        ];
    }

}
