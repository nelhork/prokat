@extends('layouts.app')

@section('content')
    <div class="container py-4 px-3 mx-auto">
        <h2 class="mb-4">Остатки</h2>
        <form >
            <div class="mb-3">
                <label for="date" class="form-label">Дата</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $date->format('Y-m-d') }}">
            </div>
            @foreach($stocks as $stock)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="stocks[]" {{ in_array($stock->id, $selectedStocks) ? 'checked' : '' }} value="{{ $stock->id }}" id="stock_{{ $stock->id }}">
                    <label class="form-check-label" for="stock_{{ $stock->id }}">
                        {{ $stock->name }}
                    </label>
                </div>
            @endforeach
            <div class="mb-3 mt-3">
                <button type="submit" class="btn btn-primary">Показать</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Текущий остаток</th>
                <th scope="col">Ожидаемый остаток</th>
                <th scope="col">Итого</th>
            </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>
                            {{ $model->id }} {{ $model->name }}
                        </td>
                        <td>
                            {{ $model->current_qty }}
                        </td>
                        <td>
                            {{ $model->expected_qty }}
                        </td>
                        <td>
                            {{ $model->current_qty + $model->expected_qty }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
