<?php

namespace Tz\Skolkovo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    public const DATE_FORMAT = 'd.m.Y';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|exists:rates,id',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'date-from' => 'required|date_format:'.self::DATE_FORMAT,
            'date-to' => 'required|date_format:'.self::DATE_FORMAT,
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Укажите тариф.',
            'type.exists' => 'Такого тарифа не существует.',
            'name.required' => 'Заполните имя.',
            'lastname.required' => 'Заполните фамилию.',
            'phone.required' => 'Укажите телефон.',
            'date-from.required' => 'Укажите начало времени аренды.',
            'date-from.date_format' => 'Не верный формат даты.',
            'date-to.required' => 'Укажите конец времени аренды.',
            'date-to.date_format' => 'Не верный формат даты.',
        ];
    }
}
