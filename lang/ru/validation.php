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

    'accepted' => 'Должно быть принято.',
    'accepted_if' => 'Должно быть принято, если :other равен :value.',
    'active_url' => 'Не является допустимым URL-адресом.',
    'after' => 'Должно быть датой после :date.',
    'after_or_equal' => 'Должно быть датой после или равной :date.',
    'alpha' => 'Должно содержать только буквы.',
    'alpha_dash' => 'Должно содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => 'Должно содержать только буквы и цифры.',
    'array' => 'Должен быть массивом.',
    'ascii' => 'Поле должно содержать только однобайтовые буквенно-цифровые символы и символы.',
    'before' => 'Дата должна быть раньше :date.',
    'before_or_equal' => 'Дата должна быть меньше или равна :date.',
    'between' => [
        'array' => 'Элементов должно быть от :min до :max.',
        'file' => 'Размер файла должен находиться в диапазоне от :min до :max Кб.',
        'numeric' => 'Значение должно находиться в диапазоне от :min до :max.',
        'string' => 'Количество символов должно быть между :min и :max.',
    ],
    'boolean' => 'Поле должно иметь значение true или false.',
    'confirmed' => 'Подтверждение не соответствует.',
    'current_password' => 'Пароль неверен.',
    'date' => 'Не является допустимой датой.',
    'date_equals' =>  'В поле должна быть дата, равная :date.',
    'date_format' => 'Не соответствует формату :format.',
    'decimal' => 'Должны быть :decimal десятичные знаки.',
    'declined' => 'Значение должно быть отклонено.',
    'declined_if' =>  'Значение должно быть отклонено, если :other равен :value.',
    'different' => 'Параметры должны быть разными.',
    'digits' => 'Значение :attribute должно быть :digits.',
    'digits_between' => 'Значение должно находиться в диапазоне от :min до :max.',
    'dimensions' => 'Недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'doesnt_end_with' => 'Значение не может заканчиваться одним из списка: :values.',
    'doesnt_start_with' => 'Значение не может начинаться с одного из списка: :values.',
    'email' => 'Некорректный email.',
    'ends_with' => 'Значение должно заканчиваться одним из списка: :values.',
    'enum' => 'Значение не существует.',
    'exists' => 'Значение не существует.',
    'file' => 'Должно быть файлом!',
    'filled' => 'Поле должно быть заполнено',
    'gt' => [
        'array' => 'Элементов должно быть более :value.',
        'file' => 'Вес файла должен быть больше :value Кб',
        'numeric' => 'Значение должно быть больше :value.',
        'string' => 'Количество символов должно быть больше :value.',
    ],
    'gte' => [
        'array' => 'Элементов должно быть не менее :value.',
        'file' => 'Вес файла должен быть больше или равен :value Кб',
        'numeric' => 'Значение должно быть больше или равно :value.',
        'string' => 'Количество символов должно быть больше или равно :value.',
    ],
    'image' => 'Должно быть изображением!',
    'in' => 'Выбранное значение недействительно.',
    'in_array' => 'Поле не существует в :other.',
    'integer' => 'Должно быть целое число.',
    'ip' => 'Невалидный IP адрес.',
    'ipv4' => 'Невалидный IPv4 адрес.',
    'ipv6' => 'Невалидный IPv6 адрес.',
    'json' => 'Невалидный JSON.',
    'lowercase' => 'Должен быть нижний регистр.',
    'lt' => [
        'array' => 'Количество элементов должно быть меньше :value.',
        'file' => 'Размер файла должен быть меньше :value Кб.',
        'numeric' => 'Значение должно быть меньше :value.',
        'string' =>  'Количество символов должно быть меньше :value.',
    ],
    'lte' => [
        'array' => 'Количество элементов не должно быть более :value.',
        'file' => 'Вес файла должен быть меньше или равен :value Кб.',
        'numeric' => 'Значение должно быть меньше или равно :value.',
        'string' => 'Количество символов должно быть меньше или равно :value.',
    ],
    'mac_address' => 'Значение должно быть действительным MAC-адресом.',
    'max' => [
        'array' => 'Не должно быть более :max элементов.',
        'file' => 'Размер файла не должен превышать :max килобайт.',
        'numeric' => 'Значение не должно быть больше :max.',
        'string' => 'Количество символов не должно превышать :max.',
    ],
    'max_digits' => 'Значение более :max.',
    'mimes' => 'Файл должен соответствовать типу: :values.',
    'mimetypes' => 'Файл должен быть типа: :values.',
    'min' => [
        'array' => 'Должно быть не менее :min элементов.',
        'file' => 'Размер должен быть не менее :min Кб.',
        'numeric' => 'Значение должно быть не менее :min.',
        'string' => 'Количество символов должно быть не меньше :value.',
    ],
    'min_digits' => 'Должно быть не менее :min.',
    'missing' => 'Поле должно отсутствовать.',
    'missing_if' => 'Поле должно отсутствовать, если :other равно :value.',
    'missing_unless' => 'Поле должно отсутствовать, если только :other не равно :value.',
    'missing_with' => 'Поле должно отсутствовать, если присутствует :values.',
    'missing_with_all' => 'Поле должно отсутствовать, если присутствуют :values.',
    'multiple_of' => 'Значение должно быть кратен :value.',
    'not_in' => 'Выбранный значение недействительно.',
    'not_regex' => 'Формат недействителен.',
    'numeric' => 'Значение должно быть числом.',
    'password' => [
        'letters' => 'Должен содержать хотя бы одну букву.',
        'mixed' => 'Должен содержать хотя бы одну прописную и одну строчную букву',
        'numbers' => 'Должен содержать хотя бы одно число.',
        'symbols' => 'Должен содержать хотя бы один символ.',
        'uncompromised' => 'Данное значение появилось в результате утечки данных. Пожалуйста, выберите другое.',
    ],
    'present' => 'Поле должно присутствовать',
    'prohibited' => 'Поле запрещено.',
    'prohibited_if' => 'Поле запрещено, если :other равно :value.',
    'prohibited_unless' => 'Поле запрещено, если только :other не находится в :values.',
    'prohibits' => 'Поле запрещает присутствие :other.',
    'regex' => 'Формат недействителен.',
    'required' => 'Поле является обязательным.',
    'required_array_keys' => 'Поле должно содержать записи для: :values.',
    'required_if' => 'Поле является обязательным, если :other равно :value.',
    'required_if_accepted' => 'Поле является обязательным, если принято :other.',
    'required_unless' => 'Поле является обязательным, если только :other не находится в :values.',
    'required_with' => 'Поле :attribute является обязательным, если присутствует :values.',
    'required_with_all' => 'Поле является обязательным, если присутствуют :values.',
    'required_without' => 'Поле является обязательным, если :values отсутствует.',
    'required_without_all' => 'Поле является обязательным, если ни одно из :values не присутствует.',
    'same' => 'Параметры :attribute и :other должны совпадать.',
    'size' => [
        'array' => 'Должен содержать :size элементов.',
        'file' => 'Размер должен быть :size Кб.',
        'numeric' => 'Должен быть :size.',
        'string' => 'Требуется длина :size.',
    ],
    'starts_with' => 'Должно начинаться с чего-то из: :values.',
    'string' => 'Должен быть строкой.',
    'timezone' => 'Должен быть указан действительный часовой пояс.',
    'unique' => 'Занято!',
    'uploaded' => 'Не удалось загрузить.',
    'uppercase' => 'Должно быть в верхнем регистре.',
    'url' => 'Должно быть действительным URL-адресом.',
    'ulid' => 'Параметр должен быть действительным ULID.',
    'uuid' => 'Параметр должен быть допустимым UUID.',

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
