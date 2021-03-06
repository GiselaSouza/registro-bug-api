<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBugRequest extends FormRequest
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
            "title" => "required",
            "description" => "nullable",
            "classification" => "required",
            "classification_bug_id" => "required",
            "status" => "required",
            "userId" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "title" => "Título",
            "description" => "Descrição",
            "classification" => "Classificação",
            "classification_bug_id" => "Classificação do Bug",
            "status" => "Status",
            "userId" => "Usuário",
        ];
    }
}
