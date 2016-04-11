<?php

namespace invitados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
        use SoftDeletes;
       protected $table = 'eventos';

       /**
        * The attributes that are mass assignable.
        *
        * @var array
        */

       protected $fillable = [
           'evento_nombre',
           'evento_lugar',
           'evento_fecha',
           'evento_hora',
           'evento_cupo',
           'evento_observaciones',
       ];

       protected $dates = ['deleted_at'];
}
