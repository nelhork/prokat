@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Склады</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Адрес</th>
                <th scope="col">Комментарий</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->address }}</td>
                    <td>{{ $stock->comment }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('stocks.edit', ['stock' => $stock]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('stocks.destroy', ['stock' => $stock])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $stocks->links() }}
        <a class="btn btn-primary" href="{{ route('stocks.create') }}">Создать</a>
    </div>
@endsection
