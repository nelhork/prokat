@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('stocks.update', ['stock' => $stock])}}" method="post">
            @method('PUT')
            @include('stocks.form',['stock' => $stock])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
