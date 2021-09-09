<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-100 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl">Log in!</h1>
            <form action="/sessions" method="POST" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="email_login" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email_login" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
                    @error('password')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div>
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>

                @endif
            </form>
        </main>
    </section>
  </x-layout>