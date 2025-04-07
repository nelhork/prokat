@extends('layouts.app')

@section('content')
<div class="container py-4 px-3 mx-auto">
    <h2>Создать заказ</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('orders.store')}}" method="post" class="needs-validation">
        <div class="mb-3">
            @include('components.input', [
                'id' => 'clientName',
                'title' => 'Имя',
                'name' => 'client[name]',
                'type' => 'text',
                'value' => ''
            ])
        </div>
        <div class="mb-3">
            @include('components.input', [
                'id' => 'clientPhone',
                'title' => 'Телефон',
                'name' => 'client[phone]',
                'type' => 'text',
                'value' => ''
            ])
        </div>
        <model-selector :models="[]" :delivery-price="0"></model-selector>
        @include('orders.form', [
            'order' => $order,
            'statuses' => $statuses,
            'employees' => $employees,
            'stocks' => $stocks
        ])
        <button type="submit" class="btn btn-primary">Оформить заказ</button>
    </form>
</div>
@endsection
