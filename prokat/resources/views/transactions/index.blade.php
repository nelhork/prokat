@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Транзакции</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Баланс</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->comment }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('transactions.edit', ['transaction' => $transaction]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('transactions.destroy', ['transaction' => $transaction])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
        <a class="btn btn-primary" href="{{ route('transactions.create') }}">Создать</a>
    </div>
@endsection
