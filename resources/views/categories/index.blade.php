<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg ">
                <div class="border-b-2 border-gray-400 flex items-center justify-between">
                    <p class="p-6 text-2xl font-semibold">Categories</p>
                    <div class="p-6">
                        <a href="{{ route('categories.create') }}"
                           class="text-base bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Create</a>
                    </div>
                </div>

                <div>
                    @foreach($categories as $category)
                        <div class="bg-white border-b border-gray-100 flex items-center justify-between">
                            <p
                                class="w-80 px-6 py-4 font-medium text-gray-900 flex items-center">
                                {{ \Illuminate\Support\Str::title($category->name) }}
                            </p>
                            <div class="py-4 px-6 flex items-center space-x-4">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="font-medium bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md">Edit</a>
                                <form action="{{ route('categories.delete', $category) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                            class="font-medium bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class=" mt-6 pb-6 px-6">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
