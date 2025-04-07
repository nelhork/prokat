@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('items.store')}}" method="post" class="needs-validation">
            @include('items.form', [
                'item' => $item,
                'models' => $models,
                'stocks' => $stocks
            ])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
