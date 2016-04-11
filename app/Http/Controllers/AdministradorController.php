<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;

use invitados\Http\Requests;

class AdministradorController extends Controller
{

  public function __construct(){
    $this->middleware('auth',['only'=>'admin']);
  }

    public function admin(){
      return view('dashboard');
    }
}
