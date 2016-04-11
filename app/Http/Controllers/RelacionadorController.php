<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;
use invitados\Http\Requests;
use invitados\Http\Requests\UserCreateRequest;
use invitados\Http\Requests\UserUpdateRequest;
use invitados\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use invitados\User;

class RelacionadorController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('admin');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $usuarios = User::all();
      return view('usuario.index',compact('usuarios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('usuario.registrar');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserCreateRequest $request)
  {
    $user = User::create($request->all());
      $user->tipo = 'Relacionador';
      $user->estado ='1';
      $user->save();
      Session::flash('message','El Relacionador se aregistrado correctamente');
    return  Redirect::to('/relacionador');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
        $usuario = User::find($id);
        return view('usuario.edit',['usuario'=>$usuario]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UserUpdateRequest $request, $id)
  {
    $usuario = User::find($id);
    $usuario->fill($request->all());
    $usuario->save();
    Session::flash('message','Relacionador editado correctamente');
    return Redirect::to('/relacionador');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $usuario = User::find($id);
    $usuario->delete();
    Session::flash('message','Usuario Eliminado correctamente');
    return Redirect::to('/relacionador');
  }

}
