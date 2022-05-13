<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-sm py-6">
        <div class="font-semibold flex items-center justify-between">
            <div class="flex space-x-4">
                <p class="text-4xl font-semibold">Expenses</p>
                <div class="flex flex-col space-y-1 text-xs">
                    <div class="grid grid-cols-2 gap-x-4">
                        <p class="">Total credit:</p>
                        <p class="text-blue-600 ml-2 text-left">
                            &#163;{{ number_format( $totalMonthCredit / 100, 2 ) }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-x-4">
                        <p class="">Total debit:</p>
                        <p class="text-stone-600 ml-2 text-left">
                            &#163;{{ number_format( $totalMonthDebit / 100, 2 ) }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-x-4">
                        <p class="">Balance:</p>
                        <p class="{{ ($totalMonthCredit - $totalMonthDebit) < 0 ? 'text-red-600' : 'text-green-600' }} ml-2 text-left">
                            &#163;{{ number_format( ($totalMonthCredit - $totalMonthDebit) / 100, 2 ) }}</p>
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('expenses.import-from-file') }}"
                   class="text-sm bg-slate-500 hover:bg-slate-600 text-white py-2 px-4 rounded-sm">Import from
                    file</a>
                <a href="{{ route('expenses.create') }}"
                   class="text-sm bg-slate-500 hover:bg-slate-600 text-white py-2 px-4 rounded-sm">Import Manually</a>
            </div>
        </div>
        @if($openEditModal)
            @include('livewire.expense-edit')
        @endif

        @if($openDeleteModal)
            @include('livewire.expense-delete')
        @endif

        <div class="mt-10">
            <div class="my-2 flex justify-between items-center ">
                <div class="h-full flex items-center">
                    <input
                        autocomplete="off"
                        type="search" wire:model.debounce.800ms="searchTerm" name="search"
                        placeholder="Search for... "
                        class="h-8 rounded-sm shadow-sm text-gray-600 px-3 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs" />
                    <div class="ml-4 flex items-center">
                        <p class="text-sm text-gray-600">Category: </p>
                        <select wire:model.defer="selectedCategory" wire:change.debounce500ms="$emit('categoryUpdated')" name="selectedCategory" id="" class="h-full ml-2 rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                            <option value="all">All</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ \Illuminate\Support\Str::title($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="h-full flex items-center">
                    <p class="text-sm text-gray-600">Results per page: </p>
                    <select name="perPage" wire:model.defer="perPage" wire:change.debounce500ms="$emit('paginationUpdated')" class="ml-2 h-full rounded-sm text-gray-600 border border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-xs">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select>
                </div>
            </div>
            <x-expenses.table :expenses="$expenses"></x-expenses.table>
            <div class="mt-2">
                {{ $expenses->links() }}
            </div>
        </div>
    </div>
</div>
