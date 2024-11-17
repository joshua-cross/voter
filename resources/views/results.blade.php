<x-layout>
    <x-slot:title>Results - {{ $poll->title }}</x-slot:title>
    <div class="mx-auto mt-10 max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="border rounded-md border-gray-400 p-6 shadow-md bg-white mt-6">

        </div>
        @auth
            @if(!$poll->isExpired())
                <p class="mt-2">Not yet voted? <a href="{{ route('poll', $poll->id) }}">Click here</a> to vote.</p>
            @else
                <p class="mt-2">This poll has expired. <a href="{{ route('home') }}">Click here</a> to return to the
                    dashboard</p>
            @endif
        @else
            <div class="mt-2 flex items-center gap-5 justify-start">
                <a href="{{ route('register') }}"
                   class="rounded-md btn px-3 py-2 text-sm font-medium text-white">Register</a>
                <a class="text-blue-400 text-sm hover:underline" href="{{ route('login') }}">Or Login</a>
            </div>
        @endauth
    </div>
</x-layout>