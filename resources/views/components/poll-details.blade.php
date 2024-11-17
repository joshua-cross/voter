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
        <p class="mt-1 text-text-light text-sm">
            <a href="{{ route("user", $poll->user->id) }}"
               class="text-sm/6 ">{{ $poll->user->name }}</a>
        </p>
    </div>
</div>