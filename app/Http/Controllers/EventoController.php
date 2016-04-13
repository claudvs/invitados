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
              /*$users = DB::table('users')
              ->join('relacion_relacionador_invitados', 'users.id', '=', 'relacion_relacionador_invitados.invitados_id')
              ->select('users.*')
              ->get();*/
        $misinvitados = DB::select('
                    SELECT users.*
                    FROM users, relacion_relacionador_invitados
                    WHERE relacion_relacionador_invitados.relacionador_id ='.$realacionarid. ' AND
                    relacion_relacionador_invitados.invitado_id = users.id');
        $evento = Evento::find($id);

        return view('evento.show',['evento'=>$evento],compact('misinvitados'));
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
