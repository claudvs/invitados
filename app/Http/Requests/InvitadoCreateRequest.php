<?php

namespace invitados\Http\Requests;

use invitados\Http\Requests\Request;

class InvitadoCreateRequest extends Request
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
        'name' => 'required',
        'apellidos' => 'required',
        'nroCelular' => 'required',
        'email' => 'required|unique:users',
        'fechanac' => 'required',
        'sexo' => 'required',
      ];
    }
}
