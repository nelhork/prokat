@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Перемещения</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Товар</th>
                <th scope="col">Место выдачи</th>
                <th scope="col">Место назначения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movements as $movement)
                <tr>
                    <td>{{ $movement->comment }}</td>
                    <td>{{ $movement->item->model->name }}</td>
                    @if($movement->fromStock === null)
                        <td>Клиент</td>
                    @else
                        <td>{{ $movement->fromStock->name }}</td>
                    @endif
                    @if($movement->toStock === null)
                        <td>Клиент</td>
                    @else
                        <td>{{ $movement->toStock->name }}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $movements->links() }}
    </div>
@endsection
