@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('accounts.update', ['account' => $account])}}" method="post">
            @method('PUT')
            @include('accounts.form',['account' => $account])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
