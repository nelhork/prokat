@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Счета</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Баланс</th>
                <th scope="col">Создан</th>
                <th scope="col">Состояние</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->comment }}</td>
                    <td>{{ $account->amount }}</td>
                    <td>{{ $account->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $account->status }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('accounts.edit', ['account' => $account]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('accounts.destroy', ['account' => $account])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $accounts->links() }}
        <a class="btn btn-primary" href="{{ route('accounts.create') }}">Создать</a>
    </div>
@endsection
