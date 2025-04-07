<div class="mb-3">
    @include('components.input', [
        'id' => 'stockName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => $stock['name']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'stockAddress',
        'title' => 'Адрес',
        'name' => 'address',
        'type' => 'text',
        'value' => $stock['address']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'stockComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'tag' => 'textarea',
        'value' => $stock['comment']
        ])
</div>
