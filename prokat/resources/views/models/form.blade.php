<div class="mb-3">
    @include('components.input', [
        'id' => 'modelComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'type' => 'text',
        'value' => $model['comment']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'modelName',
        'title' => 'Название',
        'name' => 'name',
        'type' => 'text',
        'value' => $model['name']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'modelType',
        'title' => 'Тип',
        'name' => 'type',
        'type' => 'text',
        'value' => $model['type']
    ])
</div>

@include('models.image-preview', [
    'showPreview' => $showPreview,
    'photo' => $model->photo1Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelPhoto1',
        'title' => 'Ссылка на Фото 1',
        'name' => 'photo1',
        'type' => 'file',
        'value' => $model['photo1']
    ])
</div>

@include('models.image-preview', [
    'showPreview' => $showPreview,
    'photo' => $model->photo2Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelPhoto2',
        'title' => 'Ссылка на Фото 2',
        'name' => 'photo2',
        'type' => 'file',
        'value' => $model['photo2']
    ])
</div>

@include('models.image-preview', [
    'showPreview' => $showPreview,
    'photo' => $model->photo3Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelPhoto3',
        'title' => 'Ссылка на Фото 3',
        'name' => 'photo3',
        'type' => 'file',
        'value' => $model['photo3']
    ])
</div>

@include('models.video-preview', [
    'showPreview' => $showPreview,
    'video' => $model->video1Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelVideo1',
        'title' => 'Ссылка на Видео 1',
        'name' => 'video1',
        'type' => 'file',
        'value' => $model['video1']
    ])
</div>

@include('models.video-preview', [
    'showPreview' => $showPreview,
    'video' => $model->video2Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelVideo2',
        'title' => 'Ссылка на Видео 2',
        'name' => 'video2',
        'type' => 'file',
        'value' => $model['video2']
    ])
</div>

@include('models.video-preview', [
    'showPreview' => $showPreview,
    'video' => $model->video3Url()
])

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelVideo3',
        'title' => 'Ссылка на Видео 3',
        'name' => 'video3',
        'type' => 'file',
        'value' => $model['video3']
    ])
</div>

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelDescription1',
        'title' => 'Описание модели 1',
        'name' => 'description1',
        'type' => 'text',
        'value' => $model['description1']
    ])
</div>

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelDescription2',
        'title' => 'Описание модели 2',
        'name' => 'description2',
        'type' => 'text',
        'value' => $model['description2']
    ])
</div>

<div class="mb-3">
    @include('components.input', [
        'id' => 'modelDescription3',
        'title' => 'Описание модели 3',
        'name' => 'description3',
        'type' => 'text',
        'value' => $model['description3']
    ])
</div>
