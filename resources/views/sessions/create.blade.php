<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
      <x-card>
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

          <x-form.input name="email" type="email" autocomplete="username"/>
          <x-form.input name="password" type="password" autocomplete="new-password" />
          <x-form.button>Login</x-form.button>
        </form>
      </x-card>
    </main>
  </section>
</x-layout>