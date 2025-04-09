@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Имя</th>
                <th scope="col">Телефон 1</th>
                <th scope="col">Телефон 2</th>
                <th scope="col">Телефон 3</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee['comment'] }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['phone1'] }}</td>
                    <td>{{ $employee['phone2'] }}</td>
                    <td>{{ $employee['phone3'] }}</td>
                    <td>{{ $employee['status'] }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('employees.edit', ['employee' => $employee]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('employees.destroy', ['employee' => $employee])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('employees.create') }}">Создать</a>
    </div>
@endsection
