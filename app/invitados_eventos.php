<?php

namespace invitados;

use Illuminate\Database\Eloquent\Model;

class invitados_eventos extends Model
{
  protected $fillable = [
    'evento_id',
    'invitado_id',
    'relacionador_id'
  ];
}
