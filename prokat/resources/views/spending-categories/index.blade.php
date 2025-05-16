@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Категории расходов</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('spending-categories.edit', ['category' => $category]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('spending-categories.destroy', ['category' => $category])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        <a class="btn btn-primary" href="{{ route('spending-categories.create') }}">Создать</a>
    </div>
@endsection
