@if (isset($select['label']))
    <label
        for="{{ $select['name'] }}"
        class="form-label">{{ $select['label'] }}
    </label>
@endif
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
            {{ $select['selected'] == $item['id'] ? 'selected' : '' }}>
            {{ $item[$select['display']] }}
        </option>
    @endforeach
</select>
