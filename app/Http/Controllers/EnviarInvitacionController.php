<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use invitados\User;
use invitados\Http\Requests;

class EnviarInvitacionController extends Controller
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
    public function store(Request $request)
    {
      foreach($request->all() as $key=>$requests) {
          if($key != '_token' && $key != 'evento' && $key != 'evento_nombre' && $key != 'evento_fecha' && $key != 'evento_hora' && $key != 'relacionador_nombre' && $key != 'relacionador_apellido')
          {

              if(strpos($key, 'key') === false){
              }else{
                  $ids = $requests;
                  $aux = User::find($ids);
                  Mail::send('emails.welcome', [$request->all(),'user' => $aux], function ($message)  use ($aux) {
                      $message->from('soporte@ticketeg.com.bo', 'Laravel');

                      $message->to($aux->email)->cc('klaudiocvs@gmail.com');
                  });
              }
          }
      }
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
}
