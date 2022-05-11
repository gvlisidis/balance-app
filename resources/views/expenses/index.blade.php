<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md py-6">
            <div class="font-semibold flex items-center justify-between">
                <p class="text-4xl font-semibold">Expenses</p>
                <div class="flex space-x-4">
                    <a href="{{ route('expenses.import-from-file') }}"
                       class="text-base bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-sm">Import from
                        file</a>
                    <a href="{{ route('expenses.create') }}"
                       class="text-base bg-slate-500 hover:bg-slate-600 text-white py-2 px-4 rounded-sm">Import Manually</a>
                </div>
            </div>

            <div class="mt-10">
                <table class="table table-auto w-full text-left">
                    <thead>
                    <tr>
                        <th class=" font-semibold">Label</th>
                        <th class="text-center font-semibold">Amount</th>
                        <th class="text-center font-semibold">Category</th>
                        <th class="text-center font-semibold">Type</th>
                        <th class="text-center font-semibold">Date Issued</th>
                        <th class="text-center font-semibold">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($expenses as $expense)
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
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
                            <td class="p-2 flex justify-end">
                                <a href="{{ route('expenses.edit', $expense) }}" class="font-medium bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md">Edit</a>
                                <form action="{{ route('expenses.delete', $expense) }}" method="post" class="ml-2">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                            class="font-medium bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </form>
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
