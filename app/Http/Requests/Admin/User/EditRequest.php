<?php

namespace App\Http\Requests\Admin\User;

use App\Enums\News\Status;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//             'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    
//     public function messages(): array { //в обхоб папки руссификации
//        return [
//            'required' => 'Это уникальное сообщение только для этой формы! Поле :attribute',
//        ];
//    }

    public function attributes(): array {
        return [
            'title' => 'категория',
            'description' => 'описание',
        ];
    }
}
