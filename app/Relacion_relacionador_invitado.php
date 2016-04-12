<?php

namespace invitados;

use Illuminate\Database\Eloquent\Model;

class Relacion_relacionador_invitado extends Model
{
    protected $table = 'relacion_relacionador_invitados';

    protected $fillable = [
      'relacionador_id',
      'invitado_id'
    ];
}
