<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientePostRequest extends FormRequest
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
            'nombre' => ['required','max:25','min:2'],
            'mail' => ['required','email:rfc,dns','max:40'],
            'telefono' => ['required','numeric', 'gt:999999'],
            'mensaje'=> ['required'],
        ];
    }
}

