@extends('layouts.app')

@section('content')
<div class="container py-4 px-3 mx-auto">
    <h2>Редактировать заказ</h2>
    <form action="{{route('orders.update', $order)}}" method="post" class="needs-validation">
        @method("PUT")
        <model-selector
            :models="{{json_encode($order['models'])}}"
            :delivery-price="{{json_encode($order['delivery_price'])}}"
        ></model-selector>
        @include('orders.form', [
            'order' => $order,
            'statuses' => $statuses,
            'employees' => $employees,
            'stocks' => $stocks
        ])
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
