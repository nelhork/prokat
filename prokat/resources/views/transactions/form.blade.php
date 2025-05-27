<div class="mb-3">
    @include('components.input', [
        'id' => 'accountAmount',
        'title' => 'Баланс',
        'name' => 'amount',
        'type' => 'number',
        'value' => old('amount', $transaction['amount'])
    ])
    @include('components.input', [
        'id' => 'accountComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'type' => 'text',
        'value' => old('comment', $transaction['comment'])
    ])

    @php
        $types = [
            ['id' => 'доход', 'name' => 'Доход'],
            ['id' => 'расход', 'name' => 'Расход'],
            ['id' => 'перемещение', 'name' => 'Перемещение']
        ];

        $selects = [
            ['name' => 'type', 'label' => 'Тип', 'items' => $types, 'display' => 'name'],
            ['name' => 'primary_account_id', 'label' => 'Основной счет', 'items' => $accounts, 'display' => 'name'],
            ['name' => 'secondary_account_id', 'label' => 'Дополнительный счет', 'items' => $accounts, 'display' => 'name', 'placeholder' => 'Не выбрано'],
            ['name' => 'spending_category_id', 'label' => 'Категория трат', 'items' => $categories, 'display' => 'name', 'placeholder' => 'Не выбрано'],
            ['name' => 'income_source_id', 'label' => 'Источник дохода', 'items' => $sources, 'display' => 'name', 'placeholder' => 'Не выбрано'],
            ['name' => 'project_id', 'label' => 'Проект', 'items' => $projects, 'display' => 'name', 'placeholder' => 'Не выбрано'],
            ['name' => 'order_id', 'label' => 'Заказ', 'items' => $orders, 'display' => 'id', 'placeholder' => 'Не выбрано'],
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
                        {{ old($select['name'], $item[$select['name']] ?? '') == $item['id'] ? 'selected' : '' }}>
                        {{ $item[$select['display']] }}
                    </option>
                @endforeach
            </select>
        </div>
    @endforeach
</div>
