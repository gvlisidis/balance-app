<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg h-fit p-10 ">
                <form action="{{ route('expenses.upload-file') }}" method="post" class="flex flex-col space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="file" name="monthly_expenses" class="h-10 rounded-sm text-gray-700 w-96" />
                        @error('monthly_expenses') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex">
                        <button class="font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
