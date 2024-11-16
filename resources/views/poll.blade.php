<x-layout>
    <x-slot:title>
        Voter - {{ $poll->title }}
    </x-slot:title>
    <div class="mx-auto mt-10 max-w-7xl px-2 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold">{{ $poll->title }}</h1>
        <div class="flex flex-wrap mt-4 gap-10">
            <div class="max-w-lg">
                <p class="font-medium">Description</p>
                <p class="mt-1 text-text-light text-sm">{{ $poll->description }}</p>
            </div>
            <div>
                <p class="font-medium">Expiry Date</p>
                <p class="mt-1 text-text-light text-sm">{{ $poll->expiry_date }}</p>
            </div>
            <div>
                <p class="font-medium">Responses</p>
                <p class="mt-1 text-text-light text-sm">{{ $poll->responseCount() }}</p>
            </div>
            <div>
                <p class="font-medium">Author</p>
                <p class="mt-1 text-text-light text-sm">{{ $poll->user->name }}</p>
            </div>
        </div>
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
        @endauth
    </div>
</x-layout>
