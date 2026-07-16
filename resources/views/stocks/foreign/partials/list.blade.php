<div class="container" id="stock_list">
    <div class="container">
        @foreach($stocks as $stock)
            <a href="{{ route('stocks.foreign.show', $stock->id) }}">{{ $stock->ticker }} - {{ $stock->stock_name }}</a>
            <br>
        @endforeach
    </div>
</div>
<div class="container pt-5">{{ $stocks->appends(request()->query())->links() }}</div>
