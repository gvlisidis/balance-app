<div>
    <div class="bg-gray-300 opacity-70 fixed inset-0" wire:click="closeEditModal()"></div>
    <div class="flex flex-col m-auto h-fit max-w-2xl bg-white fixed inset-0 shadow-md rounded-sm">
        <!-- top -->
        <div class="flex justify-end items-center py-1 w-full">
            <!-- close button -->
            <div class="pr-6">
                <button class="font-semibold text-xl" wire:click="closeEditModal()">&times;</button>
            </div>
        </div>

        <!--  content -->
        <div class="px-6 pb-6 text-xs md:text-sm space-y-2">
            <form action="#" method="post" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="label" class="font-semibold text-gray-600">Label</label>
                        <input type="text" wire:model.debounce.500ms="label" id="label" name="label" class="rounded-sm text-gray-600 px-3 border border-gray-400" value="" />
                    </div>
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="category_id" class="font-semibold text-gray-600">Category</label>
                        <select wire:model.debounce.500ms="category_id" name="category_id" id="category_id" class="rounded-sm text-gray-600 border border-gray-400">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="amount" class="font-semibold text-gray-600">Amount</label>
                        <input type="text" wire:model.debounce.500ms="amount" id="amount" name="amount" class="rounded-sm text-gray-600 px-3 border border-gray-400" value="" />
                    </div>
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="type" class="font-semibold text-gray-600">Type</label>
                        <select wire:model.debounce.500ms="type" name="type" id="type" class="rounded-sm text-gray-600 border border-gray-400">
                            <option value="{{ \App\Models\Expense::DEBIT }}" {{ $type ==  \App\Models\Expense::DEBIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::DEBIT]) }}</option>
                            <option value="{{ \App\Models\Expense::CREDIT }}" {{ $type ==  \App\Models\Expense::CREDIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::CREDIT]) }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="issued_at" class="font-semibold text-gray-600">Issue Date</label>
                        <input type="text" wire:model.debounce.500ms="issued_at" id="issued_at" name="issued_at" class="rounded-sm text-gray-600 px-3 border border-gray-400" value="" />
                    </div>
                    <div class="flex flex-col space-y-1 text-xs md:text-sm">
                        <label for="user_id" class="font-semibold text-gray-600">User</label>
                        <select wire:model.debounce.500ms="user_id" name="user_id" id="user_id" class="rounded-sm text-gray-600 border border-gray-400">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id  == $user_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($user->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm" wire:click.prevent="updateExpense()">Update</button>
                <button class="font-medium bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-sm ml-2" wire:click.prevent="closeEditModal()">Cancel</button>
            </form>
        </div>
    </div>
</div>
