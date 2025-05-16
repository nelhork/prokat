<div class="mb-3">
    @include('components.input', [
        'id' => 'accountName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => old('name', $account['name'])
    ])
    @include('components.input', [
        'id' => 'accountComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'type' => 'text',
        'value' => old('comment', $account['comment'])
    ])
    @include('components.input', [
        'id' => 'accountAmount',
        'title' => 'Баланс',
        'name' => 'amount',
        'type' => 'number',
        'value' => old('amount', $account['amount'])
    ])

    @php
        $types = [
            ['id' => 'используется', 'name' => 'Используется'],
            ['id' => 'отключен', 'name' => 'Отключен'],
        ];

        $selects = [
            ['name' => 'status', 'label' => 'Статус', 'items' => $types, 'display' => 'name'],
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
