@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <th scope="row">{{ $stock->id }}</th>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->address }}</td>
                    <td>{{ $stock->comment }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('stocks.edit', ['stock' => $stock]) }}">Редактировать</a>
                        <form action="{{route('stocks.destroy', ['stock' => $stock])}}" method="post">
                            <button class="btn btn-danger">Удалить</button>
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('stocks.create') }}">Создать</a>
    </div>
@endsection
