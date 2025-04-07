@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('models.store')}}" method="post" class="needs-validation">
            @include('models.form', ['model' => $model])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
