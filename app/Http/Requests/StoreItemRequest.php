<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'nome' => 'required|min:3|max:25',
            'descricao' => 'required|min:10|max:250',
            'valor' => 'required|numeric',
            'quantidade' => 'required|numeric',
            'disponivel' => 'required|boolean',
            'src' => 'required|image|max:2048|mimes:jpeg,png',
          ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo Nome é obrigatório!',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres!',
            'nome.max' => 'O campo Nome deve ter no máximo 25 caracteres!',
            'descricao.required' => 'O campo Descrição é obrigatório!',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 10 caracteres!',
            'descricao.max' => 'O campo Descrição deve ter no máximo 250 caracteres!',
            'valor.required' => 'O campo Valor é obrigatório!',
            'quantidade.required' => 'O campo Quantidade é obrigatório!',
            'disponivel.required' => 'O campo Disponível é obrigatório!',
            'src.required' => 'O campo de Imagem é obrigatório!',
            'src.image' => 'Apenas arquivos de imagem',
            'src.max' => 'A imagem não pode ser maior que 2mb',
        ];
    }
}
