<div>
    <x-modal wire:model="show">
        <div class="border-b-2 border-gray-300">
            <h3 class="font-semibold text-lg px-6 py-3">New idea? Add it below!</h3>
        </div>
        <div class="px-6 pb-6">
            <form action="#" method="post" class="space-y-5">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" wire:model.debounce.500ms="title" name="title" id="title" class="w-full rounded-sm border border-gray-400 text-gray-600 text-sm">
                </div>
                <div>
                    <label for="description">Description (optional)</label>
                    <textarea wire:model.debounce.500ms="description" id="description" rows="5" class="w-full rounded-sm border border-gray-400 text-gray-600 text-sm"></textarea>
                </div>
                <button class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm" wire:click.prevent="createTodoItem()">Add</button>
            </form>

        </div>
    </x-modal>
</div>
