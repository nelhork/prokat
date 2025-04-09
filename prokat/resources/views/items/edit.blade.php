@extends('layouts.app')

@section('content')
<div class="container py-4 px-3 mx-auto">
    <h2>Редактировать товар</h2>
    <form action="{{route('items.update', $item)}}" method="post" class="needs-validation" enctype="multipart/form-data">
        @method("PUT")
        @include('items.form', [
            'item' => $item,
            'models' => $models,
            'stocks' => $stocks,
            'showPhotos' => true
        ])
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
