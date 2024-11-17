<x-layout>
    <x-slot:title>
        Voter - {{ $poll->title }}
    </x-slot:title>
    <div class="mx-auto mt-10 max-w-7xl px-2 sm:px-6 lg:px-8">
        <x-poll-details :poll="$poll"/>
        <x-share-menu/>
        @auth
            <form class="border rounded-md border-gray-400 p-6 shadow-md bg-white mt-6"
                  action="{{ route("submit-response") }}"
                  method="post">
                @csrf
                <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                <div class="flex flex-col gap-1">
                    @foreach($poll->options as $option)
                        <div>
                            <input type="radio" name="option_id"
                                   class="appearance-none hidden"
                                   id="option-{{ $option->id }}"
                                   value="{{ $option->id }}">
                            <label for="option-{{ $option->id }}">{{ $option->title }}</label>
                        </div>
                    @endforeach
                    <button class="rounded-md mt-3 btn px-3 py-2 text-sm font-medium text-white" type="submit">Submit
                        Vote
                    </button>
                </div>
            </form>
        @else
            <div class="border rounded-md border-gray-400 p-6 shadow-md bg-white mt-6">
                <h2 class="text-xl font-bold">Not Registered?</h2>
                <p class="mt-2 text-sm">You require an account with Voter in order to vote on this poll.</p>
                <div class="mt-2.5 flex items-center gap-5 justify-start">
                    <a href="{{ route('register') }}"
                       class="rounded-md btn px-3 py-2 text-sm font-medium text-white">Register</a>
                    <a class="text-blue-400 text-sm hover:underline" href="{{ route('login') }}">Or Login</a>
                </div>
            </div>
        @endauth
    </div>
</x-layout>
