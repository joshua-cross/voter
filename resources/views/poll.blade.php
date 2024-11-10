<x-layout>
    <x-slot:title>
        Voter - {{ $poll->title }}
    </x-slot:title>
    <h1>{{ $poll->title }}</h1>
    <p>{{ $poll->description }}</p>
    <p>Options: {{ count($poll->options) }}</p>
    @foreach($poll->options as $option)
        <p>Option: {{ $option->title }}</p>
    @endforeach
</x-layout>
