<form class="mx-auto mt-20 max-w-lg px-2 sm:px-6 lg:px-8" method="post"
      action="/forgot-password">
    @csrf
    <h1 class="text-2xl mb-5 font-medium">Forgot Password?</h1>
    <div>
        <label for="price" class="block text-sm/6 font-medium text-gray-900">Email Address</label>
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
    @if(session("status") || $errors->has("email"))
        <p class="text-xs mt-1">If an account exists with this email you should receive an email</p>
    @endif
    <div class="mt-2.5">
        <button href="/forgot-password"
                type="submit"
                class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white" aria-current="page">Submit
        </button>
    </div>
</form>
