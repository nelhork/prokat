<div class="mb-3">
    @include('components.input', [
        'id' => 'movementComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'type' => 'text',
        'value' => $movement['comment']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'movementItemId',
        'title' => 'Товар',
        'name' => 'item',
        'type' => 'text',
        'value' => $movement->item->name
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'movementFromStockId',
        'title' => 'Склад выдачи',
        'name' => 'from_stock_id',
        'tag' => 'text',
        'value' => $movement->stock->name
        ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'movementToStockId',
        'title' => 'Склад возврата',
        'name' => 'to_stock_id',
        'type' => 'text',
        'value' => $movement->stock->name
        ])
</div>
