<x-app-layout>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Create Blog Post') }}
                </h2>

                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input id="image" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="file" name="image" onchange="previewImage(event)">
                        @error('image')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Preview -->
                    <div id="image-preview" class="mt-4">
                        <img id="preview" class="hidden h-auto max-w-full rounded-md shadow-sm" style="max-width: 400px; max-height: 400px;" />
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input id="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" value="{{ old('title') }}" required autofocus>
                        @error('title')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="text" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="text" rows="8" required>{{ old('text') }}</textarea>
                        @error('text')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 ml-4 text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Publish Post') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const preview = document.getElementById('preview');
            reader.onload = function() {
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
