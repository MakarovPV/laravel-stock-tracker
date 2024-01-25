<div class="col-2  h-90 border shadow-lg bg-white">
    <ul class="list-group list-group-flush p-2" id="category_list">
        <li class="list-group-item list-group-item-action">Главная</li>
        <li class="list-group-item list-group-item-action" id="stock_category">Акции</li>

        <ul class="list-group list-group-flush p-2 d-none" id="stock_list">
            <li class="list-group-item list-group-item-action" id="moscow_stock">Мосбиржа</li>
            <ul class="list-group list-group-flush text-center d-none" id="moscow_stock_list">
                @foreach($stocks_moscow as $stock)
                    <li class="list-group-item list-group-item-action moscow-stock-item list-data-item" data-source="{{$stock->stock_exchange}}" id="{{$stock->stock_ticker_symbol}}">{{$stock->stock_name}}</li>
                @endforeach
                <button type="button" id="new_moscow" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal">
                    <li class="list-group-item list-group-item-action" id="moscow_add">Добавить</li>
                </button>
            </ul>

            <li class="list-group-item list-group-item-action" id="foreign_company_stock">Зарубежные компании</li>
            <ul class="list-group list-group-flush text-center d-none" id="foreign_stock_list">
                @foreach($stocks_foreign as $stock)
                    <li class="list-group-item list-group-item-action foreign-stock-item list-data-item" data-source="{{$stock->stock_exchange}}" id="{{$stock->stock_ticker_symbol}}">{{$stock->stock_name}}</li>
                @endforeach
                <button type="button" id="new_foreign" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal">
                    <li class="list-group-item list-group-item-action" id="foreign_add">Добавить</li>
                </button>
            </ul>
        </ul>
        <li class="list-group-item list-group-item-action" id="divs">Облигации</li>
        <li class="list-group-item list-group-item-action" id="currency">Валюта</li>
        <li class="list-group-item list-group-item-action" id="crypto">Криптовалюта</li>
        <ul class="list-group list-group-flush text-center d-none" id="moscow_stock_list">
            @foreach($crypto as $crypto_item)
                <li class="list-group-item list-group-item-action crypto-item list-data-item" data-source="{{$crypto_item->stock_exchange}}" id="{{$crypto_item->stock_ticker_symbol}}">{{$crypto_item->stock_name}}</li>
            @endforeach
            <button type="button" id="new_crypto" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal">
                <li class="list-group-item list-group-item-action" id="moscow_add">Добавить</li>
            </button>
        </ul>
        @include('includes.modal')

    </ul>
</div>


