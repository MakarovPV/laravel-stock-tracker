@extends('layouts.app')

@section('content')
    <div id="stocks">
        <div data-stock-source="foreign">
        <select id="sector_select">
            @foreach($sectors as $sector)
                <option value="{{ $sector }}">{{ $sector }}</option>
            @endforeach
        </select>
        </div>
        <div id="stock_list_container">
            @include('stocks.foreign.partials.list')
        </div>
    </div>
@endsection
