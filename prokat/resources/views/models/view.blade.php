@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        Прогнозируемые остатки

        <form >
            <div class="mb-3">
                <label for="date" class="form-label">Дата</label>
                <input type="date" class="form-control" id="date" name="date" value="2025-08-01">
            </div>
            @foreach($stocks as $stock)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="stocks[]" value="{{ $stock->id }}" id="stock_{{ $stock->id }}">
                    <label class="form-check-label" for="stock_{{ $stock->id }}">
                        {{ $stock->name }}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Показать</button>
        </form>

        Прогнозируемый остаток: <strong>{{ $qty }}</strong>
    </div>
@endsection
