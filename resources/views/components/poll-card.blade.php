<a href="{{ route("poll", $poll->id) }}" class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
        <div class="min-w-0 flex-auto">
            <p class="text-sm/6 font-semibold text-gray-900">{{$poll->title}}</p>
            <p class="mt-1 truncate text-xs/5 text-gray-500">{{$poll->description}}</p>
        </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <a href="{{ route("user", $poll->user->id) }}"
           class="text-sm/6 text-gray-900">{{ $poll->user->name }}</a>
        <p class="mt-1 text-xs/5 text-gray-500">Expires:
            <time datetime="2023-01-23T13:23Z">{{ $poll->formattedExpiryDate() }}</time>
        </p>
        <p></p>
    </div>
</a>
