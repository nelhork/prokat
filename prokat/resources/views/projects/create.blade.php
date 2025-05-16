@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('projects.store')}}" method="post" class="needs-validation">
            @include('projects.form', ['project' => $project])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
