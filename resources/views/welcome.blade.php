<x-layout>
    <x-slot:title>
        Voter - Homepage
    </x-slot:title>
    @if(count($polls) > 0)
        <div class="mx-auto mt-10 max-w-7xl px-2 sm:px-6 lg:px-8">
            <ul role="list" class="divide-y divide-gray-100 flex flex-col gap-3">
                @foreach($polls as $poll)
                    <li>
                        <x-poll-card :poll="$poll"></x-poll-card>
                    </li>
                @endforeach
            </ul>
        </div>
    <div class="mt-6">
        {{ $polls->onEachSide(1)->links() }}
    </div>
    @else
        <h1>No Results are found</h1>
    @endif
</x-layout>
