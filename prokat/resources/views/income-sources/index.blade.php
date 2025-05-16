@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Источники дохода</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($incomeSources as $incomeSource)
                <tr>
                    <td>{{ $incomeSource->name }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('income-sources.edit', ['source' => $incomeSource]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('income-sources.destroy', ['source' => $incomeSource])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $incomeSources->links() }}
        <a class="btn btn-primary" href="{{ route('income-sources.create') }}">Создать</a>
    </div>
@endsection
