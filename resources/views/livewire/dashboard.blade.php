<div class="overflow-hidden">

    {{--Filters--}}
    <div class="bg-white px-6 py-4">
        <div class="flex items-center space-x-6">
            <div>
                <select wire:model.lazy="selectedYear" name="year" id="year"
                        wire:change.debounce500ms="$emit('yearUpdated')"
                        class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            <div>
                <select wire:model.lazy="selectedMonth" wire:change.debounce500ms="$emit('monthUpdated')"
                        name="month" id="month"
                        class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                    <option value="13">All</option>
                    @foreach(config('months') as $key => $month)
                        <option
                            value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="h-16 bg-custom-beige px-6 flex items-center">
        <h3 class="font-bold">Averages per Month:</h3>
        <div class="ml-10 ">
            <div class="flex space-x-3">
                @foreach($averages as $categoryAverage)
                    <div>{{ $categoryAverage['name'] }}: {{  number_format($categoryAverage['value'], 2) }}</div>
                @if(!$loop->last)
                    <div>|</div>
                @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="mt-6 px-6 max-w-lg">
            <div class="grid grid-cols-2 gap-4">
                <x-dashboard.expense-card title="Supermarket">
                    {{ number_format($superMarketTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Amazon">
                    {{ number_format($amazonTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Fuel">
                    {{ number_format($fuelTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Gymnastics">
                    {{ number_format($gymnasticsTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Energy">
                    {{ number_format($energyTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Childcare">
                    {{ number_format($childcareTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Clothes">
                    {{ number_format($clothesTotal / 100, 2) }}
                </x-dashboard.expense-card>

                <x-dashboard.expense-card title="Bodyshop">
                    {{ number_format($bodyshopTotal / 100, 2) }}
                </x-dashboard.expense-card>
            </div>
        </div>
        <div class="px-6">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
                <div class="w-[700px] h-72 bg-white mt-6 rounded-md">
                    @if($supermarketChart->data->isNotEmpty())
                        <livewire:livewire-column-chart
                            :column-chart-model="$supermarketChart"
                        />
                    @else
                        <div class="w-full h-full flex justify-center items-center">
                            No data for the year {{ $selectedYear }}
                        </div>
                    @endif
                </div>
                <div class="w-[700px] h-72 bg-white mt-6 rounded-md">
                    @if($fuelChart->data->isNotEmpty())
                        <livewire:livewire-column-chart
                            :column-chart-model="$fuelChart"
                        />
                    @else
                        <div class="w-full h-full flex justify-center items-center">
                            No data for the year {{ $selectedYear }}
                        </div>
                    @endif
                </div>
                <div class="w-[700px] h-72 bg-white mt-6 rounded-md">
                    @if($amazonChart->data->isNotEmpty())
                        <livewire:livewire-column-chart
                            :column-chart-model="$amazonChart"
                        />
                    @else
                        <div class="w-full h-full flex justify-center items-center">
                            No data for the year {{ $selectedYear }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
