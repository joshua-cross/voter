<h1>Hello World</h1>
@foreach($polls as $poll)
    <h2><a href="{{ route('poll', $poll->id) }}">{{$poll->title}}</a></h2>
    @foreach($poll->options as $option)
        <h3>{{$option->title}}</h3>
    @endforeach
@endforeach
