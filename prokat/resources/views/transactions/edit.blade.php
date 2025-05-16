@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('transactions.update', ['transaction' => $transaction])}}" method="post">
            @method('PUT')
            @include('transactions.form',['transaction' => $transaction])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
