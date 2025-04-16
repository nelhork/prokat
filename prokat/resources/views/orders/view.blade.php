@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Выдача заказа #{{ $order['id'] }}</h2>
        @if(session()->has('message'))
            <div class="alert alert-danger">{{session()->get('message')}}</div>
        @endif
        <div class="card mb-3">
            <div class="card-header">Информация о заказе</div>
            <div class="card-body">
                <p>Клиент: {{ $order->client->name }}</p>
                <p>Телефон: {{ $order->client->phone1 }}</p>
                <p>Дата начала аренды: {{ date("d.m.Y", strtotime($order['begin_at'])) }}</p>
                <p>Дата окончания аренды: {{ date("d.m.Y", strtotime($order['end_at'])) }}</p>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Аренда</th>
                <th>Депозит</th>
                <th>Доступные остатки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->models as $model)
                <tr>
                    <td>{{ $model['name'] }}</td>
                    <td>{{ $model->pivot->count }}</td>
                    <td>{{ $model->pivot->price }}</td>
                    <td>{{ $model->pivot->deposit }}</td>
                    <td @if($model['available'] < $model['pivot']['count']) class="text-danger" @endif>
                        <strong>{{ $model['available'] }}</strong>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($order['status_id'] === 1)
            <form action="{{ route('orders.give', $order['id']) }}" method="POST">
                @method("PUT")
                <button type="submit" class="btn btn-primary">Выдать заказ</button>
            </form>
        @elseif($order['status_id'] === 2)
            <form action="{{ route('orders.take', $order['id']) }}" method="POST">
                @method("PUT")
                <button type="submit" class="btn btn-primary">Забрать заказ</button>
            </form>
        @endif

    </div>
@endsection
