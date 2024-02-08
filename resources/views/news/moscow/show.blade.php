@extends('layouts.app')

@section('content')
    <div class="container">
        {{ $fullNews[0]->title }}
        <br><br>
        {{ $fullNews[0]->body }}
    </div>
@endsection
