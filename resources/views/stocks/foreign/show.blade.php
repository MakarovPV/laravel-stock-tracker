@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <p>Название компании: {{ $info[0]->company_name }}</p>
        <p>Текущая цена: {{ $info[0]->price }} {{ $info[0]->currency }}</p>
        <p>Оценка стоимости акции: {{ $info[0]->dcf_price }}</p>
        <p>Разница между реальной и оценочной стоимостью акции: {{ $info[0]->dcf_price_difference }}</p>
        <p>Волатильность: {{ $info[0]->volatility }}</p>
        <p>Капитализация: {{ $info[0]->capitalization }}</p>
        <p>Размер дивидендов: {{ $info[0]->last_dividends }} {{ $info[0]->currency }}</p>
        <p>Изменение цены за сутки: {{ $info[0]->changes }}</p>
        <p>Биржа: {{ $info[0]->exchange }}</p>
        <p>Индустрия: {{ $info[0]->industry }}</p>
        <p>Сектор: {{ $info[0]->sector }}</p>
        <p>Сайт: <a href="{{ $info[0]->website }}">{{ $info[0]->website }}</a></p>
        <p>Описание компании: {{ $info[0]->description }}</p>
        <p>CEO: {{ $info[0]->ceo }}</p>
        <p>Страна: {{ $info[0]->country }}</p>
        <p>Количество сотрудников: {{ $info[0]->employees }}</p>
        <p>Номер телефона: {{ $info[0]->phone }}</p>
        <p>Почтовый индекс: {{ $info[0]->zip }}</p>
    </div>
@endsection
