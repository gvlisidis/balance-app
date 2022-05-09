<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg ">
                <div class="text-2xl font-semibold border-b-2 border-gray-400 flex items-center justify-between">
                    <p class="p-6">Expenses</p>
                    <div class="p-6">
                        <a href="{{ route('expenses.create') }}"
                           class="text-lg bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Import from file</a>
                    </div>
                </div>

                <div>
                    @forelse($expenses as $expense)
                        <div class="bg-white border-b border-gray-100 flex">
                            <p
                                class="w-80 px-6 py-4 font-medium text-gray-900 flex items-center">
                                {{ \Illuminate\Support\Str::title($expense->label) }}
                            </p>
                            <div class="w-80 px-6 py-4 flex items-center space-x-4">
                                <a href="{{ route('expenses.edit', $expense) }}"
                                   class="font-medium bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md">Edit</a>
                                <form action="{{ route('expenses.delete', $expense) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                            class="font-medium bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-8">
                            <p class="text-gray-700 text-xl">No Expenses found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
