@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <form
            action="{{ route('pricelists.store') }}"
            method="post" class="needs-validation"
        >
            <div class="mb-3">
                <label class="form-label">Модель:</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $pricelist->model->name }}"
                    readonly
                >
            </div>
            <input type="hidden" name="model_id" value="{{ $pricelist['model_id'] }}">
            @include('pricelists.form', ['pricelist' => $pricelist])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
