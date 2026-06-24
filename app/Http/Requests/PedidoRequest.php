<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class PedidoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_nome'      => 'required|string|min:2|max:200',
            'email'             => 'required|string|max:150|email',
            'produto'           => 'required|string|min:2|max:200',
            'quantidade'        => 'required|integer|min:1',
            'key_idempotencia'  => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_nome.required'     => 'O campo nome do cliente é obrigatório.',
            'cliente_nome.string'       => 'O campo nome do cliente deve ser uma string.',
            'cliente_nome.min'          => 'O campo nome do cliente deve ter no mínimo :min caracteres.',
            'cliente_nome.max'          => 'O campo nome do cliente deve ter no máximo :max caracteres.',

            'email.required'            => 'O campo email é obrigatório.',
            'email.string'              => 'O campo email deve ser uma string.',
            'email.max'                 => 'O campo email deve ter no máximo :max caracteres.',
            'email.email'               => 'O campo email deve ser um endereço de email válido.',

            'produto.required'          => 'O campo produto é obrigatório.',
            'produto.string'            => 'O campo produto deve ser uma string.',
            'produto.min'               => 'O campo produto deve ter no mínimo :min caracteres.',
            'produto.max'               => 'O campo produto deve ter no máximo :max caracteres.',

            'quantidade.required'       => 'O campo quantidade é obrigatório.',
            'quantidade.integer'        => 'O campo quantidade deve ser um número inteiro.',
            'quantidade.min'            => 'O campo quantidade deve ser no mínimo :min.',

            'key_idempotencia.required' => 'O campo chave de idempotência é obrigatório.',
            'key_idempotencia.string'   => 'O campo chave de idempotência deve ser uma string.',
            'key_idempotencia.max'      => 'O campo chave de idempotência deve ter no máximo :max caracteres.',
        ];
    }

    #[Override]
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors'  => $validator->errors()
            ], 422)
        );
    }
}
