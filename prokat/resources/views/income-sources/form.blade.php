<div class="mb-3">
    @include('components.input', [
        'id' => 'incomeSourcesName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => old('name', $incomeSource['name'])
    ])
</div>
