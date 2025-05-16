@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('income-sources.update', ['source' => $source])}}" method="post">
            @method('PUT')
            @include('income-sources.form',['incomeSource' => $source])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
