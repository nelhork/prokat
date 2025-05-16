@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('spending-categories.update', ['category' => $category])}}" method="post">
            @method('PUT')
            @include('spending-categories.form',['category' => $category])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
