<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;

use invitados\Http\Requests;
use Illuminate\Http\Response;
use invitados\invitados_eventos;
use Auth;
use Mail;
use Redirect;
class Invitados_EventoController extends Controller
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
        $text = '';
        $relacionador = Auth::user()->id;
        foreach($request->all() as $key=>$requests) {
            if($key != '_token' && $key != 'evento')
            {
              $aux = invitados_eventos::create(array(
                'evento_id' => $request->input('evento'),
                'relacionador_id' => $relacionador,
                'invitado_id' => $requests
              ));
            }
        }
      /*
        Mail::send('emails.welcome', $request->all(), function ($message) {
              $message->from(Auth::user()->email, 'Laravel');

              $message->to('klaudiocvs@gmail.com')->cc('klaudiocvs@gmail.com');
          });
*/
        return  Redirect::to('evento/'.$request->input('evento'));

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
