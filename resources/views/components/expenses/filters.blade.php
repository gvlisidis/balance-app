<div class="mt-2 mb-4 flex justify-between items-center ">
    <div class="h-full flex items-center">
        <input
            autocomplete="off"
            type="search" wire:model.live.debounce.800ms="searchTerm" name="search"
            placeholder="Search for... "
            class="h-8 rounded-sm shadow-sm text-gray-600 px-3 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs"/>
        <div class="ml-4 flex items-center">
            <p class="text-sm text-gray-600">Category: </p>
            <select wire:model.blur="selectedCategory" wire:change.debounce500ms="$dispatch('categoryUpdated')"
                    name="selectedCategory" id=""
                    class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                <option value="all">All</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}">{{ \Illuminate\Support\Str::title($category->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="ml-4 flex items-center">
            <p class="text-sm text-gray-600">Type: </p>
            <select wire:model.blur="selectedType" wire:change.debounce500ms="$dispatch('typeUpdated')"
                    name="type" id=""
                    class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                <option value="all">All</option>
                <option value="1">Debit</option>
                <option value="2">Credit</option>
            </select>
        </div>
        <div class="ml-4 flex items-center">
            <p class="text-sm text-gray-600">Month: </p>
            <select wire:model.blur="selectedMonth" wire:change.debounce500ms="$dispatch('monthUpdated')"
                    name="month" id=""
                    class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                <option value="13">All</option>
                @foreach(config('months') as $key => $month)
                    <option
                        value="{{ $key }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="ml-4 flex items-center">
            <p class="text-sm text-gray-600">Year: </p>
            <select wire:model.blur="selectedYear" wire:change.debounce500ms="$dispatch('yearUpdated')"
                    name="year" id=""
                    class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <div class="ml-4 flex items-center">
            <p class="text-sm text-gray-600">Sort by: </p>
            <select wire:model.blur="sortBy" wire:change.debounce500ms="$dispatch('sortByUpdated')"
                    name="sort-by" id=""
                    class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                <option value="">-</option>
                <option value="amount">Amount</option>
            </select>
        </div>
    </div>
    <div class="h-full flex items-center">
        <p class="text-xs text-gray-600">Results per page: </p>
        <select name="perPage" wire:model.blur="perPage"
                wire:change.debounce500ms="$dispatch('paginationUpdated')"
                class="ml-2 h-full rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
        </select>
    </div>
</div>
