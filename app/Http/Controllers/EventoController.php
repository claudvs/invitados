<?php

namespace invitados\Http\Controllers;

use invitados\Http\Requests;
use invitados\Http\Requests\EventoCreateRequest;
use invitados\Http\Requests\EventoUpdateRequest;
use Illuminate\Http\Response;
use invitados\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use invitados\Evento;
use invitados\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
class EventoController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
    $this->middleware('admin',['only'=>['create','updaye','destroy']]);

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $eventos = Evento::All();
      return view('evento.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evento.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoCreateRequest $request)
    {
      Evento::create($request->all());
        Session::flash('message','Evento registrado correctamente');
      return  Redirect::to('/evento');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realacionarid = Auth::user()->id;
        $evento = Evento::find($id);
        $relacionadores = User::all()->where('tipo','Relacionador');

              /*$users = DB::table('users')
              ->join('relacion_relacionador_invitados', 'users.id', '=', 'relacion_relacionador_invitados.invitados_id')
              ->select('users.*')
              ->get();*/
        $misinvitados = DB::select('
                      SELECT users.*
                      FROM users,relacion_relacionador_invitados
                      WHERE users.tipo ='.'"Invitado"' .' AND
                      relacion_relacionador_invitados.relacionador_id = '.$realacionarid. ' AND
                      relacion_relacionador_invitados.invitado_id = users.id AND
                      NOT users.id IN (SELECT invitados_eventos.invitado_id
                      FROM invitados_eventos
                      WHERE invitados_eventos.evento_id = '.$id.'
                      )
                    ');

        $invitados = DB::select('
                SELECT users.*
                FROM users, invitados_eventos
                WHERE   invitados_eventos.relacionador_id ='.$realacionarid. ' AND
                invitados_eventos.invitado_id = users.id AND
                invitados_eventos.evento_id='.$id.''
      );
      $numeroinvitados = DB::select('
              SELECT COUNT(invitados_eventos.id) AS cantidad, users.name, users.id
              FROM users, invitados_eventos
              WHERE users.tipo = '.'"Relacionador"' .'  AND
              invitados_eventos.evento_id = '.$id. ' AND
              invitados_eventos.relacionador_id = users.id
              GROUP BY users.name
             ');

      $invitadosrelacionador = DB::select('
              SELECT invitados_eventos.id AS inveve,usuario1.name AS invitado, usuario1.apellidos, usuario1.email, usuario1.id, usuario2.name AS relacionador, usuario2.apellidos AS relacionadorape, usuario2.id  AS idRelacionador
              FROM users usuario1, users usuario2, invitados_eventos
              WHERE
                  invitados_eventos.evento_id =  '.$id. '  AND
                  invitados_eventos.estado = '.'"0"' .' AND
                  invitados_eventos.invitado_id = usuario1.id  AND
                  invitados_eventos.relacionador_id = usuario2.id
              GROUP BY usuario1.name
      ');
      $enviados = DB::select('
              SELECT invitados_eventos.id AS inveve,usuario1.name AS invitado, usuario1.apellidos, usuario1.email, usuario1.id, usuario2.name AS relacionador, usuario2.apellidos AS relacionadorape, usuario2.id  AS idRelacionador
              FROM users usuario1, users usuario2, invitados_eventos
              WHERE
                  invitados_eventos.evento_id =  '.$id. '  AND
                  invitados_eventos.estado = '.'"1"' .' AND
                  invitados_eventos.invitado_id = usuario1.id  AND
                  invitados_eventos.relacionador_id = usuario2.id
              GROUP BY usuario1.name
      ');

        return view('evento.show',['evento'=>$evento],compact('misinvitados','invitados','relacionadores','numeroinvitados','invitadosrelacionador','enviados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('evento.edit',['evento'=>$evento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoUpdateRequest $request, $id)
    {
        $evento = Evento::find($id);
        $evento->fill($request->all());
        $evento->save();
        Session::flash('message','Evento editado correctamente');
        return Redirect::to('/evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $evento = Evento::find($id);
          $evento->delete();
          Session::flash('message','Evento Eliminado correctamente');
          return Redirect::to('/evento');
    }
}
