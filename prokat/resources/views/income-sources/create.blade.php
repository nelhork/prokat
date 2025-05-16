@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('income-sources.store')}}" method="post" class="needs-validation">
            @include('income-sources.form', ['incomeSource' => $incomeSource])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
