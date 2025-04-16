@php
    $fields = [
        ['id' => 'comment', 'title' => 'Комментарий', 'type' => 'text'],
        ['id' => 'photo1', 'title' => 'Фото 1', 'type' => 'file'],
        ['id' => 'photo2', 'title' => 'Фото 2', 'type' => 'file'],
        ['id' => 'photo3', 'title' => 'Фото 3', 'type' => 'file'],
        ['id' => 'status', 'title' => 'Статус', 'type' => 'text']
    ];
@endphp

@foreach ($fields as $field)
    <div class="mb-3">
        @if ($showPhotos)
            @if ($field['id'] === 'photo1')
                <img class="img-fluid d-block mb-3" style="max-width: 100px" src="{{$item->photo1Url()}}" />
            @endif
            @if ($field['id'] === 'photo2')
                <img class="img-fluid d-block mb-3" style="max-width: 100px" src="{{$item->photo2Url()}}" />
            @endif
            @if ($field['id'] === 'photo3')
                <img class="img-fluid d-block mb-3" style="max-width: 100px" src="{{$item->photo3Url()}}" />
            @endif
        @endif
        @include('components.input', [
            'id' => $field['id'],
            'title' => $field['title'],
            'name' => $field['id'],
            'type' => $field['type'],
            'value' => old($field['id'], $item[$field['id']])
        ])
    </div>
@endforeach

@php
    $selects = [
        ['name' => 'model_id', 'label' => 'Модель', 'items' => $models, 'display' => 'name'],
        ['name' => 'stock_id', 'label' => 'Склад', 'items' => $stocks, 'display' => 'name']
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
                    {{ old($select['name'], $item[$select['name']] ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item[$select['display']] }}
                </option>
            @endforeach
        </select>
    </div>
@endforeach
