@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Проекты</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('projects.edit', ['project' => $project]) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{route('projects.destroy', ['project' => $project])}}" method="post">
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                @method('DELETE')
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $projects->links() }}
        <a class="btn btn-primary" href="{{ route('projects.create') }}">Создать</a>
    </div>
@endsection
