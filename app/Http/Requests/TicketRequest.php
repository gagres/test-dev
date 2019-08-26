<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'client_name' =>  ['required', 'min:3', 'max:255'],
            'client_email' => ['required', 'email'],
            'order_number' => ['required', 'min:3'],
            'title' => ['required', 'min:3', 'max:255'],
            'content' => ['required']
        ];
    }

    public function messages() {
        return [
            'required' => 'O :attribute é obrigatório',
            'max' => 'O :attribute deve ter no máximo 255 caracteres',
            'min' => 'O :attribute deve ter ao menos 3 caracteres'
        ];
    }

    public function attributes() {
        return [
            'client_name' => 'nome do cliente',
            'client_email' => 'e-mail do cliente',
            'order_number' => 'número do pedido',
            'title' => 'título do ticket',
            'content' => 'conteúdo do ticket',
        ];
    }
}
