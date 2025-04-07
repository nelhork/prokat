@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('employees.update', ['employee' => $employee])}}" method="post">
            @method('PUT')
            @include('employees.form',['employee' => $employee])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
