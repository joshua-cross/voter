<x-layout>
    <x-slot:title>
        Voter - Homepage
    </x-slot:title>
    @if(count($polls) > 0)
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach($polls as $poll)
                    <li>
                        <a href="{{ route("poll", $poll->id) }}" class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm/6 font-semibold text-gray-900">{{$poll->title}}
                                        - {{strval($poll->public)}}</p>
                                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{$poll->description}}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm/6 text-gray-900">{{ $poll->user->name }}</p>
                                <p class="mt-1 text-xs/5 text-gray-500">Expires:
                                    <time datetime="2023-01-23T13:23Z">{{ $poll->formattedExpiryDate() }}</time>
                                </p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <h1>No Results are found</h1>
    @endif
</x-layout>
