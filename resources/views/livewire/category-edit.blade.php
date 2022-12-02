<div class="py-12">
    <div class="max-w-4xl mx-auto ">
        <div class="bg-white shadow-sm sm:rounded-sm">
            <div>
                <div class="flex flex-col space-y-6">
                    <div class="flex justify-between items-center border-b-2 border-gray-300">
                        <div class="py-3 px-6">
                            <h3 class="text-xl font-bold">{{ \Illuminate\Support\Str::title($category->name) }}</h3>
                        </div>
                    </div>

                    <div class="sm:px-6 lg:px-8 pb-10">
                        <form action="#" method="post">
                            @csrf
                            <div class="space-x-4">
                                <label for="name" class="font-semibold">Name</label>
                                <input type="text" id="name" name="name"
                                       class="h-10 rounded-sm text-gray-700 px-3 w-96 ml-5"
                                      wire:model.debounce.500ms="name"/>
                                <button
                                    class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm"
                                    wire:click.prevent="updateName()">Update
                                </button>
                            </div>

                        </form>

                        <div class="mt-6 border-t border-gray-300">
                            <h4 class="font-semibold mt-2">Keywords</h4>
                            <div class="mt-4 w-60 space-y-4">
                                @if($category->keyword)
                                    @forelse($category->keyword->keywords as $key => $categoryKeyword)
                                        <div class="flex justify-between">
                                            <p>{{ $categoryKeyword }}</p>
                                            <button class="ml-8" wire:click="deleteKeyword({{ $key }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @empty
                                    @endforelse
                                @else
                                    No keywords found
                                @endif
                            </div>

                            <div class="flex mt-6 items-center">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="space-x-4">
                                        <label for="keyword">Add Keyword</label>
                                        <input type="text" id="keyword" wire:model.defer="keyword"
                                               name="keyword" class="rounded-sm border border-gray-400 h-10 w-60"/>
                                        <button
                                            class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-sm"
                                            wire:click.prevent="addKeyword()">Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
