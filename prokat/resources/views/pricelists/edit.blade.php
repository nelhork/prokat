@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form action="{{ route('pricelists.update', [
                'model' => $model['id'],
                'pricelist' => $pricelist['id']
            ]) }}" method="POST"
        >
            @method('PUT')
            <input type="hidden" name="model_id" value="{{ $model['id'] }}">
            @include('pricelists.form', ['pricelist' => $pricelist])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
