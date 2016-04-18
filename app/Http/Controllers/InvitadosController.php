<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;

use invitados\Http\Requests;
use invitados\Http\Requests\InvitadoCreateRequest;
use Auth;
use Session;
use Redirect;
use invitados\invitados_eventos;
use invitados\Evento;
use invitados\User;
use DB;
use Socialite;



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
       $relacionador = User::where('codigo','=',$request['codigo'])->first();
       $user = User::find(Auth::user()->id);

       if ($relacionador) {
         $evento = Evento::all();
         foreach($evento as $eventos) {
           $aux = invitados_eventos::create(array(
             'evento_id' => $eventos->id,
             'relacionador_id' => $relacionador->id,
             'invitado_id' => $user->id
           ));
         }
          $user->apellidos = $request['apellidos'];
          $user->nroCelular = $request['nroCelular'];
          $user->fechanac = $request['fechanac'];
          $user->save();
           $relacion = Relacion_relacionador_invitado::create(array(
             'relacionador_id' => $relacionador->id,
             'invitado_id' => Auth::user()->id
           ));
           Session::flash('message','El Invitado se a registrado correctamente');
       return  Redirect::to('/registro');
       }

       Session::flash('message','El Codigo No existe');
        return Redirect('/registrate');

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

    public function registro()
    {
      return view('invitados/welcome');
    }

    public function formularioRegistro()
    {
     $evento = invitados_eventos::where('invitado_id','=',Auth::user()->id)->first();
     if ($evento == null) {
       return view('invitados/formRegistro',compact('evento'));
     }
      return "Ya te registraste";
    }

    public function facebook()
     {
         return Socialite::driver('facebook')->redirect();
     }

     /**
      * Obtain the user information from GitHub.
      *
      * @return Response
      */
     public function callback()
     {
         $user = Socialite::driver('facebook')->user();

         $authUser = $this->findOrCreate($user);
         Auth::login($authUser);

         return Redirect('/registrate');
     }

     private function findOrCreate($facebookUser)
     {
       $authUser = User::where('facebook_id','=',$facebookUser->user['id'])->first();

       if ($authUser) {
         return $authUser;
       }

       return $this->createUser($facebookUser);
     }

     private function createUser($user)
     {
       $sexo = 'Femenino';
       if ($user->user['gender'] == 'male') {
         $sexo = 'Masculino';
       }
       $invitado = User::create();
         $invitado->name = $user->name;
         $invitado->email = $user->email;
         $invitado->facebook_id = $user->user['id'];
         $invitado->sexo = $sexo;
         $invitado->tipo = 'Invitado';
         $invitado->estado ='1';
         $invitado->save();

       return $invitado;
     }


}
