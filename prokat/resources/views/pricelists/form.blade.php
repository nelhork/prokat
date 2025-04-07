@php
    $fields = [
        ['id' => 'price_for_period', 'title' => 'Цена за период', 'step' => '1', 'type' => 'number'],
        ['id' => 'deposit_for_period', 'title' => 'Депозит за период', 'step' => '1', 'type' => 'number'],
        ['id' => 'full_price_for_period', 'title' => 'Полная стоимость за период', 'step' => '1', 'type' => 'number'],
        ['id' => 'period_min', 'title' => 'Минимальный период', 'step' => '1', 'type' => 'number'],
        ['id' => 'period_max', 'title' => 'Максимальный период', 'step' => '1', 'type' => 'number']
    ];
@endphp

@foreach ($fields as $field)
    <div class="mb-3">
        @include('components.input', [
            'id' => $field['id'],
            'title' => $field['title'],
            'name' => $field['id'],
            'type' => $field['type'],
            'value' => old($field['id'], $pricelist[$field['id']])
        ])
    </div>
@endforeach

<input type="hidden" name="model_id" value="{{ $pricelist['model_id'] }}">
