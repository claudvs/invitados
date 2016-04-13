<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;

use invitados\Http\Requests;
use invitados\Http\Requests\InvitadoCreateRequest;
use Auth;
use Session;
use Redirect;
use invitados\User;
use DB;
use invitados\Relacion_relacionador_invitado;

class InvitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

       return view('invitados.index',compact('misinvitados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invitados.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitadoCreateRequest $request)
    {
        $relacionadorID = Auth::user()->id;
        $invitado = User::create($request->all());
          $invitado->tipo = 'Invitado';
          $invitado->estado ='1';
          $invitado->save();
          $relacion = Relacion_relacionador_invitado::create(array(
            'relacionador_id' => $relacionadorID,
            'invitado_id' => $invitado->id
          ));
        Session::flash('message','El Invitado se a registrado correctamente');
      return  Redirect::to('/invitado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
