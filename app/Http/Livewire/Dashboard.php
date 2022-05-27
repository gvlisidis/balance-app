<?php

namespace App\Http\Livewire;

use App\Actions\ChartsAction;
use App\Actions\TotalAmountAction;
use App\Enum\CategoryEnum;
use Illuminate\Support\Collection;
use Livewire\Component;

class Dashboard extends Component
{
    public int $selectedMonth;
    public int $selectedYear;
    public string $type;
    public int $superMarketTotal;
    public int $amazonTotal;
    public int $fuelTotal;
    public int $gymnasticsTotal;
    public int $energyTotal;
    public int $childcareTotal;
    public int $clothesTotal;
    public int $kaliaTotal;
    public $superMarketChartData;
    public $fuelChartData;
    public $amazonChartData;

    protected $listeners = [
        //'categoryUpdated' => 'getResults',
        'monthUpdated' => 'getResults',
        'yearUpdated' => 'getResults',
        // 'typeUpdated' => 'getResults',
    ];

    public function mount()
    {
        $this->selectedMonth = now()->month - 2;
        $this->selectedYear = now()->year;
        //$this->categories = Category::pluck('id', 'name')->toArray();
    }

    public function filters(): array
    {
        return [
            'month' => $this->selectedMonth,
            'year' => $this->selectedYear,
        ];
    }

    public function superMarketTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::SUPERMARKET->value);
    }

    public function amazonTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::AMAZON->value);
    }

    public function fuelTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::FUEL->value);
    }

    public function gymnasticsTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::LOVE_ADMIN->value);
    }

    public function energyTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::ENERGY->value);
    }

    public function childcareTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::CHILDCARE->value);
    }

    public function clothesTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::CLOTHES->value);
    }

    public function kaliaTotal()
    {
        $helper = new TotalAmountAction($this->filters());
        return $helper->getCategoryTotal(CategoryEnum::KALIA->value);
    }

    public function getSupermarketChartData(): Collection
    {
        $helper = new ChartsAction($this->filters());

        return $helper->getExpensesForCategory(CategoryEnum::SUPERMARKET->value);
    }

    public function getFuelChartData(): Collection
    {
        $helper = new ChartsAction($this->filters());

        return $helper->getExpensesForCategory(CategoryEnum::FUEL->value);
    }

    public function getAmazonChartData(): Collection
    {
        $helper = new ChartsAction($this->filters());

        return $helper->getExpensesForCategory(CategoryEnum::AMAZON->value);
    }


    public function getResults()
    {
        $this->superMarketTotal = $this->superMarketTotal();
        $this->amazonTotal = $this->amazonTotal();
        $this->fuelTotal = $this->fuelTotal();
        $this->energyTotal = $this->energyTotal();
        $this->gymnasticsTotal = $this->gymnasticsTotal();
        $this->childcareTotal = $this->childcareTotal();
        $this->clothesTotal = $this->clothesTotal();
        $this->kaliaTotal = $this->kaliaTotal();
        $this->superMarketChartData = $this->getSupermarketChartData();
        $this->fuelChartData = $this->getFuelChartData();
        $this->amazonChartData = $this->getAmazonChartData();
    }

    public function render()
    {
        $helper = new ChartsAction($this->filters());
        $this->getResults();

        return view('livewire.dashboard', [
            'supermarketChart' => $helper->getExpensesForCharts($this->superMarketChartData, 'Supermarket expenses'),
            'fuelChart' => $helper->getExpensesForCharts($this->fuelChartData, 'Fuel expenses'),
            'amazonChart' => $helper->getExpensesForCharts($this->amazonChartData, 'Amazon expenses'),
        ]);
    }
}
