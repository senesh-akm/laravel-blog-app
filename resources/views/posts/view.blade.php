<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-semibold mb-4">{{ $post->title }}</h1>
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="mb-4 rounded-md" style="max-width: 100%;">
                    @endif
                    <p>{{ $post->text }}</p>
                    <div class="text-gray-700 space-y-6">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
