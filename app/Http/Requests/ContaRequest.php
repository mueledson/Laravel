<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nome" => "required",
            "valor" => "required",
            "vencimento" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "nome.required" => "O Campo Nome é OBRIGATÓRIO!",
            "valor.required" => "O Campo Valor é OBRIGATÓRIO!",
            "vencimento.required" => "O Campo Vencimento é OBRIGATÓRIO!",
        ];
    }
}
