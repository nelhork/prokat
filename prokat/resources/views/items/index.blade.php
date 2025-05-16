@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Товары</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Фото</th>
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
                    <td style="display: flex; justify-content: center">
                        <img class="img-fluid" style="width: 100px; height: 100px; margin: 3px; object-fit: cover" src="{{$item->photo1Url()}}" alt=""/>
                        <img class="img-fluid" style="width: 100px; height: 100px; margin: 3px; object-fit: cover" src="{{$item->photo2Url()}}" alt=""/>
                        <img class="img-fluid" style="width: 100px; height: 100px; margin: 3px; object-fit: cover" src="{{$item->photo3Url()}}" alt=""/>
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->model->name }}</td>
                    <td>{{ $item->stock ? $item->stock->name : 'Клиент' }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('items.edit', ['item' => $item]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('items.destroy', ['item' => $item])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
        <a class="btn btn-primary" href="{{ route('items.create') }}">Создать</a>
    </div>
@endsection
