{{--<div class="mt-4">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-3 offset-md-6 text-end">Сумма аренды</div>--}}
{{--        <div class="col-md-3">--}}
{{--            <input type="number" step="0.01" id="sum-rent" class="form-control" readonly>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row mt-2">--}}
{{--        <div class="col-md-3 offset-md-6 text-end">Сумма залога</div>--}}
{{--        <div class="col-md-3">--}}
{{--            <input type="number" step="0.01" id="sum-deposit" class="form-control" readonly>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row mt-2">--}}
{{--        <div class="col-md-3 offset-md-6 text-end">Стоимость доставки</div>--}}
{{--        <div class="col-md-3">--}}
{{--            <input type="number" step="0.01" name="delivery_price" id="delivery-price" class="form-control">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row mt-2">--}}
{{--        <div class="col-md-3 offset-md-6 text-end">Итого:</div>--}}
{{--        <div class="col-md-3">--}}
{{--            <input type="text" id="sum-total" class="form-control" readonly>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


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
            class="form-control"
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

{{--<script>--}}
{{--    let modelIndex = 1;--}}

{{--    document.getElementById('add-model').addEventListener('click', () =>--}}
{{--    {--}}
{{--        const container = document.getElementById('models-container');--}}
{{--        const row = document.querySelector('.model-row').cloneNode(true);--}}

{{--        row.querySelectorAll('select, input').forEach((element) =>--}}
{{--        {--}}
{{--            const name = element.getAttribute('name');--}}
{{--            if (name)--}}
{{--            {--}}
{{--                const newName = name.replace(/\[\d+]/, `[${modelIndex}]`);--}}
{{--                element.setAttribute('name', newName);--}}
{{--                element.value = '';--}}
{{--            }--}}
{{--        });--}}

{{--        container.appendChild(row);--}}
{{--        modelIndex++;--}}
{{--    });--}}

{{--    document.addEventListener('click', function (event)--}}
{{--    {--}}
{{--        if (event.target.classList.contains('remove-model'))--}}
{{--        {--}}
{{--            const rows = document.querySelectorAll('.model-row');--}}
{{--            if (rows.length > 1)--}}
{{--            {--}}
{{--                event.target.closest('.model-row').remove();--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}

{{--    function recalculateTotals()--}}
{{--    {--}}
{{--        let totalRent = 0;--}}
{{--        let totalDeposit = 0;--}}

{{--        document.querySelectorAll('.model-row').forEach((row) =>--}}
{{--        {--}}
{{--            const price = parseFloat(row.querySelector('input[name*="[price]"]')?.value) || 0;--}}
{{--            const deposit = parseFloat(row.querySelector('input[name*="[deposit]"]')?.value) || 0;--}}
{{--            const count = parseFloat(row.querySelector('input[name*="[count]"]')?.value) || 0;--}}

{{--            totalRent += price * count;--}}
{{--            totalDeposit += deposit * count;--}}
{{--        });--}}

{{--        document.getElementById('sum-rent').value = totalRent.toFixed(2);--}}
{{--        document.getElementById('sum-deposit').value = totalDeposit.toFixed(2);--}}

{{--        const delivery = parseFloat(document.getElementById('delivery-price')?.value) || 0;--}}
{{--        const total = totalRent + totalDeposit + delivery;--}}

{{--        document.getElementById('sum-total').value = total.toFixed(2);--}}
{{--    }--}}

{{--    document.addEventListener('input', function (event)--}}
{{--    {--}}
{{--        if (--}}
{{--            event.target.matches('input[name*="[count]"]') ||--}}
{{--            event.target.matches('input[name*="[price]"]') ||--}}
{{--            event.target.matches('input[name*="[deposit]"]') ||--}}
{{--            event.target.id === 'delivery-price'--}}
{{--        )--}}
{{--        {--}}
{{--            recalculateTotals();--}}
{{--        }--}}
{{--    });--}}

{{--    document.getElementById('add-model').addEventListener('click', () =>--}}
{{--    {--}}
{{--        setTimeout(recalculateTotals, 100);--}}
{{--    });--}}

{{--    document.addEventListener('click', function (event)--}}
{{--    {--}}
{{--        if (event.target.classList.contains('remove-model'))--}}
{{--        {--}}
{{--            setTimeout(recalculateTotals, 100);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
