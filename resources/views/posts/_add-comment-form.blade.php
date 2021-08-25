
@auth
    <x-card>
        <form action="/post/{{ $post->slug }}/comments" method="POST">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100" alt="Avatar" width="42" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" id="" cols="30" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, think of something to say" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-form.button>Post Comment</x-form.button>
            </div>
        </form>
    </x-card>
@endauth
@guest
    <p>
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login" class="text-blue-500 hover:underline">Login</a> to post a comment!
    </p>
@endguest