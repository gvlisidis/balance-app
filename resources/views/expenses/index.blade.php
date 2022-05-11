<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md">
            <div class="text-2xl font-semibold flex items-center justify-between">
                <p class="p-6">Expenses</p>
                <div class="p-6">
                    <a href="{{ route('expenses.create') }}"
                       class="text-lg bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Import from
                        file</a>
                </div>
            </div>

            <div class="mt-10">
                <table class="table table-auto w-full text-left">
                    <thead>
                    <tr>
                        <th>Label</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Date Issued</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($expenses as $expense)
                        <tr class="border-b border-gray-300">
                            <td class=" p-2">{{ \Illuminate\Support\Str::title($expense->label) }}</td>
                            <td class="text-center p-2">
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
                            <td class="text-right p-2">
                                Edit | Delete
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No expenses yet</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
