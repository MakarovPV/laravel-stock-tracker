<div class="container" id="stock_list">
    <div class="container">
        @foreach($stocks as $stock)
            {{ $stock->ticker }} - {{ $stock->stock_name }}
            <br>
        @endforeach
    </div>
</div>
<div class="container pt-5">{{ $stocks->appends(request()->query())->links() }}</div>
