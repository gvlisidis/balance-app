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

        <div class="mt-10">

            <table class="table table-auto w-full text-left">
                <thead>
                <tr class="border-2 border-custom-brown bg-custom-brown text-white text-base">
                    <th class=" font-semibold border-r border-custom-gray p-2">Label</th>
                    <th class="text-center font-semibold border-r border-custom-gray p-2">Amount</th>
                    <th class="text-center font-semibold border-r border-custom-gray p-2">Category</th>
                    <th class="text-center font-semibold border-r border-custom-gray p-2">Type</th>
                    <th class="text-center font-semibold border-r border-custom-gray p-2">Date Issued</th>
                    <th class="text-center font-semibold border-r border-custom-gray p-2">Actions</th>
                </tr>
                </thead>
                <tbody class="border-2 border-gray-300 text-sm">
                @forelse($expenses as $expense)
                    <tr class="border-b border-gray-300 hover:bg-gray-100" x-data="{ editModalOpen: false }">

                        <td class=" p-2">{{ \Illuminate\Support\Str::title($expense->label) }}</td>
                        <td class="text-center p-2 {{ $expense->type == 1 ? ' text-red-600 ' : ' text-green-600 ' }}">
                            &#163;{{ $expense->formatted_amount}}
                        </td>
                        <td class="text-center p-2">
                            {{ \Illuminate\Support\Str::title($expense->category->name) }}
                        </td>
                        <td class="text-center p-2 {{ $expense->type == 1 ? ' text-red-600 ' : ' text-green-600 ' }}">
                            {{ $expense->formatted_type }}
                        </td>
                        <td class="text-center p-2">
                            {{ $expense->issued_at->format('d/m/Y') }}
                        </td>
                        <td class="p-2 flex justify-center">
                            <livewire:expense-edit :expense="$expense" :categories="$categories" :users="$users" wire:key="{{$expense->id}}"></livewire:expense-edit>
                            <button
                                @click="editModalOpen=true"
                                class="bg-custom-green text-white font-semibold py-2 px-4 rounded-sm">Edit</button>
                            <form action="{{ route('expenses.delete', $expense) }}" method="post" class="ml-2">
                                @method('delete')
                                @csrf
                                <button type="submit"
                                        class="font-semibold bg-custom-red text-white  py-2 px-4 rounded-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6">No expenses yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-2">
                {{ $expenses->links() }}
            </div>
        </div>
    </div>
</div>
