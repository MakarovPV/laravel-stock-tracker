@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($news as $new)
            <a href="{{ route('news.foreign.show', $new->id) }}">{{$new->title}}</a>
            <br>
        @endforeach
    </div>
    <div class="container pt-5"> {{ $news->links() }}</div>
@endsection
