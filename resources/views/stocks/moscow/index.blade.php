@extends('layouts.app')

@section('content')
    <div id="stocks">
        <div data-stock-source="moscow">
        <select id="sector_select">
            @foreach($indices as $index)
                <option value="{{ $index->index_name }}">{{ $index->short_name }}</option>
            @endforeach
        </select>
        </div>
        <div id="stock_list_container">
            @include('stocks.moscow.partials.list')
        </div>
    </div>
@endsection
