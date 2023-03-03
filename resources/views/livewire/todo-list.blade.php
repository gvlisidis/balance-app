<div class="w-full mx-auto ">
    <div class="bg-white shadow-sm rounded-sm ">
        <div class="text-2xl font-semibold flex items-center justify-between">
            <p class="p-6">New Ideas</p>
        </div>

        <table class="table table-auto w-full text-left">
            <thead>
            <tr class="border-y-4 border-gray-300 text-base">
                <th class=" w-10/12 font-semibold px-6 py-3">Title</th>
                <th class="text-center font-semibold border-r border-custom-gray px-6 py-3">Mark as done</th>
            </tr>
            </thead>
            <tbody class="text-sm">
            @forelse($todoItems as $todoItem)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="px-6 py-3 relative" x-data="{ open: false }">
                        <div class="flex">
                            <button @click="open = !open">{{ \Illuminate\Support\Str::title($todoItem->title) }}</button>
                            <div  x-show="open" class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40" style="display: none">
                                <div x-show="open" class="fixed inset-0 transform" @click="open = false">
                                    <div class="absolute inset-0 bg-gray-400 opacity-75"></div>
                                </div>

                                <div x-show="open" class="bg-white rounded-sm overflow-hidden transform sm:w-full sm:mx-auto max-w-lg h-fit p-6" @click.away="open = false">
                                    {{ $todoItem->description ?? 'No description for this idea!' }}
                                </div>
                            </div>
                        </div>

                    </td>

                    <td class="px-6 py-3 flex justify-center">
                        <form action="#" method="post" class="space-y-4">
                            @csrf
                            <input type="checkbox"
                                   {{ $todoItem->done ? 'checked' : '' }} wire:change.debounce500ms="$emit('toggleState', {{ $todoItem->id }})"
                                   class="rounded-full">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-3">No new ideas yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
