@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Фильтр заказов</h2>

        <form method="GET" action="{{ route('orders.index') }}" class="mb-4">
            <div class="row g-1">
                <div class="col-md-2">
                    <input type="text" name="phone" class="form-control" placeholder="Телефон"
                           value="{{ request('phone') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="comment" class="form-control" placeholder="Комментарий"
                           value="{{ request('comment') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="status" class="form-control" placeholder="Статус"
                           value="{{ request('status') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100">Поиск</button>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary w-100">Сброс</a>
                </div>
            </div>
        </form>

        @if($orders->isEmpty())
            <p class="text-muted">Нет заказов по заданным условиям</p>
        @else
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Имя клиента</th>
                    <th>Телефон</th>
                    <th>Статус</th>
                    <th>Дата начала аренды</th>
                    <th>Дата окончания аренды</th>
                    <th>Состав заказа</th>
                    <th>Примечание</th>
                    <th>Цена доставки</th>
                    <th>Аренда</th>
                    <th>Депозит</th>
                    <th>Сотрудник выдачи</th>
                    <th>Сотрудник приема</th>
                    <th>Склад выдачи</th>
                    <th>Склад приема</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order['phone1'] }}</td>
                        <td>{{ $order->status->name }}</td>
                        <td>{{ date("d.m.Y", strtotime($order['begin_at'])) }}</td>
                        <td>{{ date("d.m.Y", strtotime($order['end_at'])) }}</td>
                        <td>
                            @if($order->models->isNotEmpty())
                                @foreach($order['models'] as $model)
                                    <div>{{ $model['name'] }}: {{ $model->pivot->count ?? '?' }}</div>
                                @endforeach
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $order['comment'] }}</td>
                        <td>{{ $order['delivery_price'] }}</td>
                        <td>{{ $order['total_amount'] }}</td>
                        <td>{{ $order['total_deposit'] }}</td>
                        <td>{{ $order->giver->name }}</td>
                        <td>{{ $order->taker->name }}</td>
                        <td>{{ $order->giverStock->address }}</td>
                        <td>{{ $order->takerStock->address }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a class="btn btn-primary" href="{{ route('orders.edit', $order) }}">
                                    <i class="bi bi-pencil"></i></a>
                                <a class="btn btn-primary" href="{{ route('orders.view', $order) }}">
                                    @if($order['status_id'] === 1)
                                        Оформить выдачу
                                    @elseif($order['status_id'] === 2)
                                        Оформить возврат
                                    @else
                                        Посмотреть
                                    @endif
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        {{ $orders->links() }}
        <a class="btn btn-primary" href="{{ route('orders.create') }}">Новый заказ</a>
    </div>
@endsection
