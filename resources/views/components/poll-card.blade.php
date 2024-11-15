<div class="flex p-6 justify-between shadow-md gap-x-6 py-5 bg-white rounded-md">
    <a href="{{ route("poll", $poll->id) }}" class="flex min-w-0 gap-x-4 underline-co text-text">
        <div class="min-w-0 flex-auto">
            <p class="text-sm/6 font-semibold text-gray-900">{{$poll->title}}</p>
            <p class="mt-1 truncate text-xs/5 text-gray-500">{{$poll->description}}</p>
        </div>
    </a>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <a href="{{ route("user", $poll->user->id) }}"
           class="text-sm/6 ">{{ $poll->user->name }}</a>
        <p class="mt-1 text-xs/5 text-gray-500">Expires:
            <time datetime="{{ $poll->expiry_date }}">{{ $poll->formattedExpiryDate() }}</time>
        </p>
        <p class="mt-1 text-xs/5 text-gray-500">{{ $poll->responseCount() }} Responses</p>
    </div>
</div>
