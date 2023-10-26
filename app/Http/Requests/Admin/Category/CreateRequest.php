<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true; //разрешено всем из группы админов
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'description' => ['nullable', 'string']
        ];
    }

    public function messages(): array { //в обхоб папки руссификации
        return [
            'required' => 'Обязательно заполнить! Поле :attribute',
        ];
    }

    public function attributes(): array { //перевод на русский язык
        return [
            'title' => 'категория',
            'description' => 'описание',
        ];
    }

}
