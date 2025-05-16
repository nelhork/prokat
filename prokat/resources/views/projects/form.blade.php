<div class="mb-3">
    @include('components.input', [
        'id' => 'projectsName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => old('name', $project['name'])
    ])
</div>
