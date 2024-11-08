<h1>Hello World</h1>
@foreach($polls as $poll)
    <h2>{{$poll->title}}</h2>
    @foreach($poll->options as $option)
        <h3>{{$option->title}}</h3>
    @endforeach
@endforeach
