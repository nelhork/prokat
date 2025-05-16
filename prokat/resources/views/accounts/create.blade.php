@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('accounts.store')}}" method="post" class="needs-validation">
            @include('accounts.form', ['account' => $account])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
