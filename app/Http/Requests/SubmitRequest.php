<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "firstName" => "required|string|min:3",
            "lastName" => "required|string|min:3",
            "email" => "required|email|unique:contacts,email",
            "password" => "required|min:8|confirmed",
        ];
    }

    public function messages()
    {
        return [
            'required' => '":attribute" обязательно к заполнению',
            'email' => '":attribute" должен быть почтой',
            'confirmed' => 'Пароли не совпадают',
            'unique' => 'Пользователь с такой почтой уже зарегистрирован',
        ];
    }
}
