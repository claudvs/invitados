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
        'nroCelular' => 'required',
        'fechanac' => 'required'
      ];
    }
}
