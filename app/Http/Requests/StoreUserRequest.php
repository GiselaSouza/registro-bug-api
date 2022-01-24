<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "profilesId" => "required",
            "classificationBugsId" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Nome do usuário",
            "email" => "Email",
            "password" => "Senha",
            "profilesId" => "Perfis",
            "classificationBugsId" => "Classificações do bug",
        ];
    }
}
