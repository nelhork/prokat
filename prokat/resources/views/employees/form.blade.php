<div class="mb-3">
    @include('components.input', [
        'id' => 'employeeComment',
        'title' => 'Комментарий',
        'name' => 'comment',
        'type' => 'text',
        'value' => $employee['comment']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeeName',
        'title' => 'Имя',
        'name' => 'name',
        'type' => 'text',
        'value' => $employee['name']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeePhone1',
        'title' => 'Телефон 1',
        'name' => 'phone1',
        'type' => 'text',
        'value' => $employee['phone1']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeePhone2',
        'title' => 'Телефон 2',
        'name' => 'phone2',
        'type' => 'text',
        'value' => $employee['phone2']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeePhone3',
        'title' => 'Телефон 3',
        'name' => 'phone3',
        'type' => 'text',
        'value' => $employee['phone3']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeeLogin',
        'title' => 'Логин',
        'name' => 'login',
        'type' => 'text',
        'value' => $employee['login']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeePassword',
        'title' => 'Пароль',
        'name' => 'password',
        'type' => 'text',
        'value' => $employee['password']
    ])
</div>
<div class="mb-3">
    @include('components.input', [
        'id' => 'employeeStatus',
        'title' => 'Статус',
        'name' => 'status',
        'type' => 'text',
        'value' => $employee['status']
    ])
</div>
