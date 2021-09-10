<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4"> Want to participate?</h2>
        </header>
        <div class="mt-6">
                        <textarea class="w-full text-sm focus:outline-none focus:ring"
                                  name="body" id="body" required placeholder="Share your thoughts..." rows="5"></textarea>

            @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-submit-button>POST</x-submit-button>
        </div>

    </form>
</x-panel>
