<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;

use invitados\Http\Requests;
use invitados\Http\Controllers\Controller;
use invitados\Http\Requests\LoginRequest;
use Auth;
use invitados\User;
use Session;
use Redirect;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
      if (Auth::attempt(['usuario'=> $request['usuario'], 'password'=> $request['password']])) {
        return Redirect::to('/dashboard');
      }
      Session::flash('message-error','Datos son incorrectos');
      return Redirect::to('/');

    }

    public function logout()
    {
      Auth::logout();
      return Redirect::to('/');
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

    public function init()
    {
        $user = User::create();
        $user->tipo = 'Administrador';
        $user->usuario = 'iAlfa';
        $user->password = '123456789';
        $user->estado ='1';
        $user->save();
    }
}
