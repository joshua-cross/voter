<form class="mx-auto mt-20 max-w-lg px-2 sm:px-6 lg:px-8" method="post"
      action="{{ route("register") }}">
    @csrf
    <h1 class="text-2xl mb-5 font-medium">Registration</h1>
    <div>
        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input
                type="text"
                name="name"
                id="name"
                wire:model.live="form.name"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
            >
        </div>
        @error('form.name')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email Address</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input
                type="email"
                name="email"
                id="email"
                wire:model.live="form.email"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
            >
        </div>
        @error('form.email')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input
                type="password"
                name="password"
                id="password"
                wire:model.live="form.password"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
            >
        </div>
        @error('form.password')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="password-confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input
                type="password"
                name="password_confirmation"
                id="password-confirmation"
                wire:model.live="form.password_confirmation"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
            >
        </div>
        @error('form.password_confirmation')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mt-2.5 flex items-center gap-5 justify-start">
        <button
            type="submit"
            class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white" aria-current="page">Register
        </button>
        <a class="text-blue-400 text-sm hover:underline" href="{{ route('login') }}">Or Login</a>
    </div>
</form>
