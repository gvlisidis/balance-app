<div>
    <div class="bg-gray-300 opacity-70 fixed inset-0" wire:click.prevent="closeDeleteModal()"></div>
    <div class="flex flex-col m-auto h-fit max-w-md bg-white fixed inset-0 shadow-md rounded-sm">
        <!-- top -->
        <div class="flex justify-between items-center p-6 w-full text-xl">
            <!-- close button -->
            <p class="font-semibold">Are you sure?</p>
            <div class="pr-2">
                <button class="font-semibold" wire:click.prevent="closeDeleteModal()">&times;</button>
            </div>
        </div>

        <!--  content -->
        <div class="px-6 pb-6 text-xs md:text-sm space-y-6">
            <div>
                <p class="font-semibold mb-2">Expense details:</p>
                <div class="flex flex-col space-y-1">
                    <div class="flex space-x-4">
                        <p>Label: </p>
                        <p>{{ $expense->label }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <p>Amount: </p>
                        <p> &#163;{{ $expense->formatted_amount }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <p>Category: </p>
                        <p>{{ $expense->category->name }}</p>
                    </div>
                </div>
            </div>

            <div class="flex">
                <button
                    wire:click.prevent="delete({{$expense->id}})"
                        class="font-semibold bg-custom-red text-white py-2 px-4 rounded-sm">
                    Delete
                </button>

                <button
                    wire:click.prevent="closeDeleteModal()"
                    class="font-semibold bg-gray-600 text-white ml-4  px-4 rounded-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
