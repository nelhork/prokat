@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container py-4 px-3 mx-auto">
        <form action="{{route('employees.store')}}" method="post" class="needs-validation">
            @include('employees.form', ['employee' => $employee])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
