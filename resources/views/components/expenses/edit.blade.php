<div x-show="editModalOpen" style="display: none">
    <div class="bg-gray-300 opacity-70 fixed inset-0"></div>
    <div class="flex flex-col m-auto h-fit max-w-7xl bg-white fixed inset-0 shadow-md rounded-sm"
         @click.away="editModalOpen = false">
        <!-- top -->
        <div class="flex justify-end items-center py-1 text-xl w-full">
            <!-- close button -->
            <div class="pr-6">
                <button class="font-bold" @click="editModalOpen = false">&times;</button>
            </div>
        </div>

        <!--  content -->
        <div class="px-6 pb-6 text-xs md:text-sm space-y-2">
            <form action="#" method="post" class="space-y-10">
                @method('patch')
                @csrf
                <div class="flex space-x-6">
                    <div class="flex flex-col space-y-1">
                        <label for="label" class="font-semibold">Label</label>
                        <input type="text" wire:model="label" id="label" name="label" class="rounded-sm text-gray-700 px-3 w-96" value="" />
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="category_id" class="font-semibold">Category</label>
                        <select wire:model="category_id" name="category_id" id="category_id" class="rounded-sm text-gray-700 w-72">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="amount" class="font-semibold">Amount</label>
                        <input type="text" wire:model="amount" id="amount" name="amount" class="rounded-sm text-gray-700 px-3 w-60" value="" />
                    </div>
                </div>

                <div class="flex space-x-6">
                    <div class="flex flex-col space-y-1">
                        <label for="issued_at" class="font-semibold">Issue Date</label>
                        <input type="text" wire:model="issued_at" id="issued_at" name="issued_at" class="rounded-sm text-gray-700 px-3 w-96" value="" />
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="type" class="font-semibold">Type</label>
                        <select wire:model="type" name="type" id="type" class="rounded-sm text-gray-700 w-72">
                            <option value="{{ \App\Models\Expense::DEBIT }}" {{ $type ==  \App\Models\Expense::DEBIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::DEBIT]) }}</option>
                            <option value="{{ \App\Models\Expense::CREDIT }}" {{ $type ==  \App\Models\Expense::CREDIT ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title(\App\Models\Expense::EXPENSE_TYPE[\App\Models\Expense::CREDIT]) }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="user_id" class="font-semibold">User</label>
                        <select wire:model="user_id" name="user_id" id="user_id" class="rounded-sm text-gray-700 w-72">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id  == $user_id ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($user->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
