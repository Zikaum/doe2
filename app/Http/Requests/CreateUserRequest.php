<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
            "bloodtype" => "required"
        ];
    }

    public function messages(){
        return [
            "name.required" => "O nome é um campo obrigatório",
            "email.required" => "O email é um campo obrigatório",
            "email.email" => "Digite um email válido",
            "email.unique" => "Este email já está em uso",
            "password.required" => "A senha é um campo obrigatório",
            "password.min" => "A senha deve ter 8 ou mais caracteres",
            "bloodtype.required" => "O tipo sanguíneo é um campo obrigatório"
        ];
    }
}
