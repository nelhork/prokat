@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Прайслисты</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Цена за период</th>
                <th scope="col">Депозит за период</th>
                <th scope="col">Полная стоимость за период</th>
                <th scope="col">Минимальный период</th>
                <th scope="col">Максимальный период</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pricelists as $item)
                <tr>
                    <td>{{ $item['price_for_period'] }}</td>
                    <td>{{ $item['deposit_for_period'] }}</td>
                    <td>{{ $item['full_price_for_period'] }}</td>
                    <td>{{ $item['period_min'] }}</td>
                    <td>{{ $item['period_max'] }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a
                                class="btn btn-primary"
                                href="{{ route('models.pricelists.edit', [
                                    'model' => $model['id'],
                                    'pricelist' => $item['id']
                                ]) }}"
                            ><i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{route('models.pricelists.destroy', ['pricelist' => $item, 'model' => $model])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary"
           href="{{ route('models.pricelists.create', ['model' => $model['id']]) }}">Создать</a>
    </div>
@endsection
