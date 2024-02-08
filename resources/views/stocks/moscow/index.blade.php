@extends('layouts.app')

@section('content')
    <div id="stocks">
        <div id="moscow">
        <select id="sector_select">
            @foreach($indices as $index)
                <option value="{{ $index->index_name }}">{{ $index->short_name }}</option>
            @endforeach
        </select>
        </div>
        <div class="container" id="stock_list">
            <div class="container">
                @foreach($stocks as $stock)
                    {{$stock->ticker}} - {{$stock->stock_name}}
                    <br>
                @endforeach
            </div>
        </div>
        <div class="container pt-5"> {{ $stocks->links() }}</div>
    </div>
@endsection
