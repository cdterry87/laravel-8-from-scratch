<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-200">
      <h1 class="text-center font-bold text-xl">Login!</h1>
      <form action="/login" method="POST" class="mt-10">
        @csrf

        @if ($errors->any())
          <ul class="mb-6">
            @foreach($errors->all() as $error)
              <li class="text-red-500 text-xs">{{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Email
          </label>
          <input type="email" name="email" id="email" value="{{ old('email') }}" class="border border-gray-400 p-2 w-full" required>
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            Password
          </label>
          <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>
        </div>
        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Login</button>
        </div>
      </form>
    </main>
  </section>
</x-layout>