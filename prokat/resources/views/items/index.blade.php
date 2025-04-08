@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Фото 1</th>
                <th scope="col">Фото 2</th>
                <th scope="col">Фото 3</th>
                <th scope="col">Статус</th>
                <th scope="col">Модель</th>
                <th scope="col">Склад</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->photo1 }}</td>
                    <td>{{ $item->photo2 }}</td>
                    <td>{{ $item->photo3 }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->model->name }}</td>
                    <td>{{ $item->stock->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('items.edit', ['item' => $item]) }}">Редактировать</a>
                        <form action="{{route('items.destroy', ['item' => $item])}}" method="post">
                            <button class="btn btn-danger">Удалить</button>
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('items.create') }}">Создать</a>
    </div>
@endsection
