@php
    $selects = [
        ['name' => 'status_id', 'label' => 'Статус', 'items' => $statuses, 'display' => 'name'],
        ['name' => 'giver_id', 'label' => 'Сотрудник выдачи', 'items' => $employees, 'display' => 'name', 'placeholder' => 'Выберите сотрудника'],
        ['name' => 'taker_id', 'label' => 'Сотрудник приема', 'items' => $employees, 'display' => 'name', 'placeholder' => 'Выберите сотрудника'],
        ['name' => 'give_stock_id', 'label' => 'Склад выдачи', 'items' => $stocks, 'display' => 'address', 'placeholder' => 'Выберите склад'],
        ['name' => 'take_stock_id', 'label' => 'Склад приема', 'items' => $stocks, 'display' => 'address', 'placeholder' => 'Выберите склад'],
    ];
@endphp

@foreach($selects as $select)
    <div class="mb-3">
        <label for="{{ $select['name'] }}" class="form-label">{{ $select['label'] }}</label>
        <select
            name="{{ $select['name'] }}"
            id="{{ $select['name'] }}"
            class="form-select"
        >
            @if(isset($select['placeholder']))
                <option value="">{{ $select['placeholder'] }}</option>
            @endif

            @foreach($select['items'] as $item)
                <option value="{{ $item['id'] }}"
                    {{ old($select['name'], $order[$select['name']] ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item[$select['display']] }}
                </option>
            @endforeach
        </select>
    </div>
@endforeach

@php
    $fields = [
        ['id' => 'delivery_address_to', 'title' => 'Адрес доставки', 'type' => 'text'],
        ['id' => 'comment', 'title' => 'Примечание', 'type' => 'text'],
   //     ['id' => 'begin_at', 'title' => 'Дата начала аренды', 'type' => 'date'],
   //     ['id' => 'end_at', 'title' => 'Дата окончания аренды', 'type' => 'date'],
   //     ['id' => 'delivery_price', 'title' => 'Стоимость доставки', 'type' => 'number', 'step' => 1],
   //     ['id' => 'total_amount', 'title' => 'Общая сумма', 'type' => 'number', 'step' => 1],
   //     ['id' => 'total_deposit', 'title' => 'Общий депозит', 'type' => 'number', 'step' => 1],
    ];
@endphp

@foreach($fields as $field)
    <div class="mb-3">
        @include('components.input', [
            'id' => $field['id'],
            'title' => $field['title'],
            'name' => $field['id'],
            'type' => $field['type'],
            'step' => $field['step'] ?? null,
            'value' => old($field['id'], $order[$field['id']] ?? '')
        ])
    </div>
@endforeach
