<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Поле :attribute должно быть принято.',
    'accepted_if'          => 'Поле :attribute должно быть принято, когда :other равно :value.',
    'active_url'           => 'Поле :attribute должно быть действительным URL.',
    'after'                => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal'       => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha'                => 'Поле :attribute может содержать только буквы.',
    'alpha_dash'           => 'Поле :attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num'            => 'Поле :attribute может содержать только буквы и цифры.',
    'any_of'               => 'Поле :attribute недействительно.',
    'array'                => 'Поле :attribute должно быть массивом.',
    'ascii'                => 'Поле :attribute может содержать только однобайтовые буквенно-цифровые символы и знаки препинания.',
    'before'               => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal'      => 'Поле :attribute должно быть датой до или равной :date.',
    'between'              => [
        'array'   => 'Поле :attribute должно содержать от :min до :max элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть от :min до :max килобайт.',
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'string'  => 'Длина поля :attribute должна быть от :min до :max символов.',
    ],
    'boolean'              => 'Поле :attribute должно быть истинным или ложным.',
    'can'                  => 'Поле :attribute содержит несанкционированное значение.',
    'confirmed'            => 'Подтверждение поля :attribute не совпадает.',
    'contains'             => 'В поле :attribute отсутствует необходимое значение.',
    'current_password'     => 'Неверный пароль.',
    'date'                 => 'Поле :attribute должно быть действительной датой.',
    'date_equals'          => 'Поле :attribute должно быть датой, равной :date.',
    'date_format'          => 'Поле :attribute должно соответствовать формату :format.',
    'decimal'              => 'Поле :attribute должно иметь :decimal десятичных знаков.',
    'declined'             => 'Поле :attribute должно быть отклонено.',
    'declined_if'          => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
    'different'            => 'Поля :attribute и :other должны отличаться.',
    'digits'               => 'Поле :attribute должно содержать :digits цифр.',
    'digits_between'       => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions'           => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле :attribute содержит повторяющееся значение.',
    'doesnt_end_with'      => 'Поле :attribute не должно заканчиваться на одно из следующих значений: :values.',
    'doesnt_start_with'    => 'Поле :attribute не должно начинаться с одного из следующих значений: :values.',
    'email'                => 'Поле :attribute должно быть действительным адресом электронной почты.',
    'ends_with'            => 'Поле :attribute должно заканчиваться одним из следующих значений: :values.',
    'enum'                 => 'Выбранное значение для :attribute недействительно.',
    'exists'               => 'Выбранное значение для :attribute недействительно.',
    'extensions'           => 'Поле :attribute должно иметь одно из следующих расширений: :values.',
    'file'                 => 'Поле :attribute должно быть файлом.',
    'filled'               => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'array'   => 'Поле :attribute должно содержать более :value элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть более :value килобайт.',
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'string'  => 'Количество символов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'array'   => 'Поле :attribute должно содержать :value элементов или более.',
        'file'    => 'Размер файла в поле :attribute должен быть не меньше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не меньше :value.',
        'string'  => 'Количество символов в поле :attribute должно быть не меньше :value.',
    ],
    'hex_color'   => 'Поле :attribute должно быть действительным шестнадцатеричным цветом.',
    'image'       => 'Поле :attribute должно быть изображением.',
    'in'          => 'Выбранное значение для :attribute недействительно.',
    'in_array'    => 'Поле :attribute должно существовать в :other.',
    'integer'     => 'Поле :attribute должно быть целым числом.',
    'ip'          => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4'        => 'Поле :attribute должно быть действительным IPv4 адресом.',
    'ipv6'        => 'Поле :attribute должно быть действительным IPv6 адресом.',
    'json'        => 'Поле :attribute должно быть действительной JSON строкой.',
    'list'        => 'Поле :attribute должно быть списком.',
    'lowercase'   => 'Поле :attribute должно содержать только строчные буквы.',
    'lt' => [
        'array'   => 'Поле :attribute должно содержать менее :value элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть менее :value килобайт.',
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'string'  => 'Количество символов в поле :attribute должно быть менее :value.',
    ],
    'lte' => [
        'array'   => 'Поле :attribute не должно содержать более :value элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть не больше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не больше :value.',
        'string'  => 'Количество символов в поле :attribute должно быть не больше :value.',
    ],
    'mac_address'  => 'Поле :attribute должно быть действительным MAC-адресом.',
    'max' => [
        'array'   => 'Поле :attribute не должно содержать более :max элементов.',
        'file'    => 'Размер файла в поле :attribute не должен превышать :max килобайт.',
        'numeric' => 'Поле :attribute не должно быть больше :max.',
        'string'  => 'Количество символов в поле :attribute не должно превышать :max.',
    ],
    'max_digits'   => 'Поле :attribute не должно содержать более :max цифр.',
    'mimes'        => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes'    => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'array'   => 'Поле :attribute должно содержать не менее :min элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть не менее :min килобайт.',
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'string'  => 'Количество символов в поле :attribute должно быть не менее :min.',
    ],
    'min_digits' => 'Поле :attribute должно содержать не менее :min цифр.',
    'missing' => 'Поле :attribute должно отсутствовать.',
    'missing_if' => 'Поле :attribute должно отсутствовать, когда :other равно :value.',
    'missing_unless' => 'Поле :attribute должно отсутствовать, если только :other не равно :value.',
    'missing_with' => 'Поле :attribute должно отсутствовать, когда присутствует :values.',
    'missing_with_all' => 'Поле :attribute должно отсутствовать, когда присутствуют :values.',
    'multiple_of' => 'Поле :attribute должно быть кратным :value.',
    'not_in' => 'Выбранное значение для :attribute недействительно.',
    'not_regex' => 'Формат поля :attribute недействителен.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => [
        'letters'       => 'Поле :attribute должно содержать как минимум одну букву.',
        'mixed'         => 'Поле :attribute должно содержать как минимум одну заглавную и одну строчную букву.',
        'numbers'       => 'Поле :attribute должно содержать как минимум одну цифру.',
        'symbols'       => 'Поле :attribute должно содержать как минимум один символ.',
        'uncompromised' => 'Указанное значение :attribute оказалось в утечке данных. Пожалуйста, выберите другое :attribute.',
    ],
    'present' => 'Поле :attribute должно присутствовать.',
    'present_if' => 'Поле :attribute должно присутствовать, когда :other равно :value.',
    'present_unless' => 'Поле :attribute должно присутствовать, если только :other не равно :value.',
    'present_with' => 'Поле :attribute должно присутствовать, когда :values присутствует.',
    'present_with_all' => 'Поле :attribute должно присутствовать, когда :values присутствуют.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_if_accepted' => 'Поле :attribute запрещено, когда :other принято.',
    'prohibited_if_declined' => 'Поле :attribute запрещено, когда :other отклонено.',
    'prohibited_unless' => 'Поле :attribute запрещено, если только :other не находится в :values.',
    'prohibits' => 'Поле :attribute запрещает присутствие :other.',
    'regex' => 'Формат поля :attribute недействителен.',
    'required' => 'Поле :attribute является обязательным.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_if_accepted' => 'Поле :attribute обязательно, когда :other принято.',
    'required_if_declined' => 'Поле :attribute обязательно, когда :other отклонено.',
    'required_unless' => 'Поле :attribute обязательно, если только :other не находится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательно, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute обязательно, когда ни одно из :values не присутствует.',
    'same' => 'Поле :attribute должно совпадать с :other.',
    'size' => [
        'array'   => 'Поле :attribute должно содержать :size элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть :size килобайт.',
        'numeric' => 'Поле :attribute должно быть :size.',
        'string'  => 'Количество символов в поле :attribute должно быть :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительной временной зоной.',
    'unique' => 'Значение поля :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить файл в поле :attribute.',
    'uppercase' => 'Поле :attribute должно содержать только прописные буквы.',
    'url' => 'Поле :attribute должно быть действительным URL.',
    'ulid' => 'Поле :attribute должно быть действительным ULID.',
    'uuid' => 'Поле :attribute должно быть действительным UUID.',

    /*
|--------------------------------------------------------------------------
| Custom Validation Language Lines
|--------------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
