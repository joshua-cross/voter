<x-layout>
    <x-slot:title>
        User - {{ $user->name }}
    </x-slot:title>
    @if(count($user->polls) > 0)
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($user->polls as $poll)
                    <x-poll-card :poll="$poll">

                    </x-poll-card>
                @endforeach
            </ul>
        </div>
    @else
        <h1>No Results are found</h1>
    @endif
</x-layout>
