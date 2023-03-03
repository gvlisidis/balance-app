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
        <tr class="border-b border-gray-300 hover:bg-gray-100" x-data="{ editModalOpen: false, confirmDeleteOpen: false }">

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


            <td class="p-2 flex justify-center space-x-4">
                <button
                    wire:click.prevent="edit({{ $expense->id}})"
                    class="bg-custom-green text-white font-semibold py-2 px-4 rounded-sm">Edit
                </button>
                <button
                    wire:click.prevent="confirmDeleteModal({{ $expense->id }})"
                    class="font-semibold bg-custom-red text-white  py-2 px-4 rounded-sm">
                    Delete
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td class="p-6">No expenses yet</td>
        </tr>
    @endforelse
    </tbody>
</table>
