@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('spending-categories.store')}}" method="post" class="needs-validation">
            @include('spending-categories.form', ['category' => $category])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
