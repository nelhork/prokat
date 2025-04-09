@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Фото 1</th>
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
                    <td>
                        <img class="img-fluid" style="max-width: 100px" src="{{$item->photo1Url()}}" alt=""/>
                        <img class="img-fluid" style="max-width: 100px" src="{{$item->photo2Url()}}" alt=""/>
                        <img class="img-fluid" style="max-width: 100px" src="{{$item->photo3Url()}}" alt=""/>
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->model->name }}</td>
                    <td>{{ $item->stock->name }}</td>
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
        <a class="btn btn-primary" href="{{ route('items.create') }}">Создать</a>
    </div>
@endsection
