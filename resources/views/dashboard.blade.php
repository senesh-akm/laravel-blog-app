<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Your Posts</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($posts as $post)
                            <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                                <a href="{{ route('posts.show', $post->id) }}">
                                    @if($post->image)
                                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="object-cover w-full mt-2 rounded-md h-36">
                                    @endif
                                    <h4 class="mt-3 text-xl font-semibold line-clamp-2">{{ $post->title }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>
