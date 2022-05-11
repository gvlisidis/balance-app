<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg h-fit p-10 ">
                <form action="{{ route('expenses.update', $expense) }}" method="post" class="space-y-10">
                    @method('patch')
                    @csrf
                    <div class="flex space-x-6">
                        <div class="flex flex-col space-y-1">
                            <label for="label" class="font-semibold">Label</label>
                            <input type="text" id="label" name="label" class="rounded-sm text-gray-700 px-3 w-96" value="{{ old('label', $expense->label ) }}" />
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="category_id" class="font-semibold">Category</label>
                            <select name="category_id" id="category_id" class="rounded-sm text-gray-700 w-72">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="amount" class="font-semibold">Amount</label>
                            <input type="text" id="amount" name="amount" class="rounded-sm text-gray-700 px-3 w-60" value="{{ old('amount', $expense->amount) }}" />
                        </div>
                    </div>

                    <div class="flex space-x-6">
                        <div class="flex flex-col space-y-1">
                            <label for="issued_at" class="font-semibold">Issue Date</label>
                            <input type="text" id="issued_at" name="issued_at" class="rounded-sm text-gray-700 px-3 w-96" value="{{ old('issued_at', $expense->issued_at->format('d/m/Y') ) }}" />
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="type" class="font-semibold">Type</label>
                            <select name="type" id="type" class="rounded-sm text-gray-700 w-72">
                                <option value="{{ \App\Models\Expense::DEBIT }}" {{ $expense->type == \App\Models\Expense::DEBIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::DEBIT]) }}</option>
                                <option value="{{ \App\Models\Expense::CREDIT }}" {{ $expense->type == \App\Models\Expense::CREDIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::CREDIT]) }}</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="user_id" class="font-semibold">User</label>
                            <select name="user_id" id="user_id" class="rounded-sm text-gray-700 w-72">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $expense->user_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($user->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
