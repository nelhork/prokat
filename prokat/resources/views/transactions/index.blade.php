@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Транзакции</h2>

        <form action="{{ route('transactions.index') }}" class="row  table-filters">
            <div class="col-md mb-1">
                @include('components.select', [
                    'select' => [
                        'name' => 'type',
                        'placeholder' => 'Тип операции',
                        'display' => 'name',
                        'selected' => request('type'),
                        'items' => [
                            [
                                'id' => 'доход',
                                'name' => 'Доход',
                            ],
                            [
                                'id' => 'расход',
                                'name' => 'Расход',
                            ],
                            [
                                'id' => 'перемещение',
                                'name' => 'Перемещение',
                            ]
                        ]
                    ]
                ])
            </div>
            <div class="col-md mb-1">
                @include('components.select', [
                    'select' => [
                        'name' => 'spending_category_id',
                        'placeholder' => 'Тип расхода',
                        'display' => 'name',
                        'selected' => request('spending_category_id'),
                        'items' => \App\Models\SpendingCategory::select('id', 'name')->get()
                    ]
                ])
            </div>
            <div class="col-md mb-1">
                @include('components.select', [
                    'select' => [
                        'name' => 'account_id',
                        'placeholder' => 'Счет',
                        'display' => 'name',
                        'selected' => request('account_id'),
                        'items' => \App\Models\Account::select('id', 'name')->get()
                    ]
                ])
            </div>
            <div class="col-md mb-1">
                @include('components.select', [
                    'select' => [
                        'name' => 'project_id',
                        'placeholder' => 'Проект',
                        'display' => 'name',
                        'selected' => request('project_id'),
                        'items' => \App\Models\Project::select('id', 'name')->get()
                    ]
                ])
            </div>
            <div class="col-md mb-1">
                @include('components.select', [
                    'select' => [
                        'name' => 'income_source_id',
                        'placeholder' => 'Источник дохода',
                        'display' => 'name',
                        'selected' => request('income_source_id'),
                        'items' => \App\Models\IncomeSource::select('id', 'name')->get()
                    ]
                ])
            </div>

            <div class="col-md mb-1">
                <button type="submit" class="col-md mb-1 btn btn-primary">Отфильтровать</button>
            </div>
            <div class="col-md mb-1">
                <a href="{{ route('transactions.index') }}" class="col-md mb-1 btn btn-secondary">Сброс</a>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Комментарий</th>
                <th scope="col">Сумма</th>
                <th scope="col">Тип</th>
                <th scope="col">Создан</th>
                <th scope="col">Источник дохода</th>
                <th scope="col">Категория затрат</th>
                <th scope="col">Проект</th>
                <th scope="col">Осн. счет</th>
                <th scope="col">Доп. счет</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->comment }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{$transaction->spendingCategory ? $transaction->spendingCategory->name : '-' }}</td>
                    <td>{{$transaction->incomeSource ? $transaction->incomeSource->name : '-' }}</td>
                    <td>{{$transaction->project ? $transaction->project->name : '-' }}</td>
                    <td>{{ $transaction->primaryAccount->name }}</td>
                    <td>{{$transaction->secondaryAccount ? $transaction->secondaryAccount->name : '-' }}</td>
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
