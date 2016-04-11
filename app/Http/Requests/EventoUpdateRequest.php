<?php

namespace invitados\Http\Requests;

use invitados\Http\Requests\Request;

class EventoUpdateRequest extends Request
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
          'evento_nombre' => 'required',
          'evento_lugar' => 'required',
          'evento_fecha' => 'required',
          'evento_hora' => 'required',
          'evento_cupo' => 'required',
          'evento_observaciones' => 'required',
        ];
    }
}
