<?php

namespace App\Http\Livewire;

use App\Actions\ChartsAction;
use App\Actions\TotalAmountAction;
use App\Enum\CategoryEnum;
use App\Services\ChartDataBuilder;
use App\Services\TotalAmountBuilder;
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
    public int $bodyshopTotal;
    public $superMarketChartData;
    public $fuelChartData;
    public $amazonChartData;
    public $averages;

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
    }

    public function filters(): array
    {
        return [
            'month' => $this->selectedMonth,
            'year' => $this->selectedYear,
        ];
    }

    public function getResults()
    {
        $totalAmountBuilder = new TotalAmountBuilder(new TotalAmountAction($this->filters()));
        $chartDataBuilder = new ChartDataBuilder(new ChartsAction($this->filters()));
        $results = $totalAmountBuilder->getTotalAmounts();
        $chartData = $chartDataBuilder->getChartData();
        $this->superMarketTotal = $results['superMarketTotal'];
        $this->amazonTotal = $results['amazonTotal'];
        $this->fuelTotal = $results['fuelTotal'];
        $this->energyTotal = $results['energyTotal'];
        $this->gymnasticsTotal = $results['gymnasticsTotal'];
        $this->childcareTotal = $results['childcareTotal'];
        $this->clothesTotal = $results['clothesTotal'];
        $this->bodyshopTotal = $results['bodyshopTotal'];
        $this->superMarketChartData = $chartData['superMarketChartData'];
        $this->fuelChartData = $chartData['fuelChartData'];
        $this->amazonChartData = $chartData['amazonChartData'];
        $this->averages = $totalAmountBuilder->getAverages();
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
