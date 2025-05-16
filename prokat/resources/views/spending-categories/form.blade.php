<div class="mb-3">
    @include('components.input', [
        'id' => 'spendingCategoriesName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => old('name', $category['name'])
    ])
</div>
