<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg h-52 p-10 ">
                <form action="{{ route('categories.store') }}" method="post" class="flex items-center">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="h-10 rounded-sm text-gray-700 px-3 w-96 ml-5" />
                    </div>
                    <button class="font-medium ml-5 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
