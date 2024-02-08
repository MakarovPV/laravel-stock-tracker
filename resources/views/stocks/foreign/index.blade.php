@extends('layouts.app')

@section('content')
    <div id="stocks">
        <div id="foreign">
        <select id="sector_select">
            @foreach($sectors as $sector)
                <option value="{{ $sector }}">{{ $sector }}</option>
            @endforeach
        </select>
        </div>
        <div class="container" id="stock_list">
            <div class="container">
                @foreach($stocks as $stock)
                    <a href="{{ route('stocks.foreign.show', $stock->id) }}">{{$stock->ticker}} - {{$stock->stock_name}}</a>
                    <br>
                @endforeach
            </div>
        </div>
        <div class="container pt-5"> {{ $stocks->links() }}</div></div>
@endsection
