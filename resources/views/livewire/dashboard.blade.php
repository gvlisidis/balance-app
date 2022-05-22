<div class="overflow-hidden">

    {{--Filters--}}
    <div class="bg-white px-6 py-4">
        <div class="flex items-center space-x-6">
            <div>
                <select wire:model.defer="selectedYear" name="year" id="year" wire:change.debounce500ms="$emit('yearUpdated')"
                        class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                    <option value="2018" {{ $selectedYear === 2018 ? 'selected' : '' }}>2018</option>
                    <option value="2019" {{ $selectedYear === 2019 ? 'selected' : '' }}>2019</option>
                    <option value="2020" {{ $selectedYear === 2020 ? 'selected' : '' }}>2020</option>
                    <option value="2021" {{ $selectedYear === 2021 ? 'selected' : '' }}>2021</option>
                    <option value="2022" {{ $selectedYear === 2022 ? 'selected' : '' }}>2022</option>
                </select>
            </div>

            <div>
                <select wire:model.defer="selectedMonth" wire:change.debounce500ms="$emit('monthUpdated')"
                        name="month" id="month"
                        class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                    <option value="13">All</option>
                    @foreach(config('months') as $key => $month)
                        <option
                            value="{{ $key }}" {{ $key  === $selectedMonth  ? 'selected' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="mt-6 px-6 flex flex-col space-y-4">
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Supermarket</h3>
            <p>&#163;{{ number_format($superMarketTotal / 100, 2) }}</p>
        </div>
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Amazon</h3>
            <p>&#163;{{ number_format($amazonTotal / 100, 2) }}</p>
        </div>
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Fuel</h3>
            <p>&#163;{{ number_format($fuelTotal / 100, 2) }}</p>
        </div>
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Gymnastics</h3>
            <p>&#163;{{ number_format($gymnasticsTotal / 100, 2) }}</p>
        </div>
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Energy</h3>
            <p>&#163;{{ number_format($energyTotal / 100, 2) }}</p>
        </div>
        <div class="w-72 bg-white rounded-md shadow-md p-4">
            <h3>Childcare</h3>
            <p>&#163;{{ number_format($childcareTotal / 100, 2) }}</p>
        </div>
    </div>
</div>
