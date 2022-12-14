<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "place" => "required",
            "reason" => "required",
            "limitdate" => "required",
            "amount" => "required|min:1"
        ];
    }

    public function messages(){
        return [
            "place.required" => "O lugar é obrigatório",
            "reason.required" => "O motivo é obrigatório",
            "date.required" => "A data limite é obrigatória",
            "amount.required" => "A quantidade de sangue é obrigatória",
            "amount.min" => "A quantidade de sangue deve ser maior que 1"
        ];
    }
}
