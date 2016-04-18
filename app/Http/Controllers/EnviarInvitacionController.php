<?php

namespace invitados\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use Redirect;
use invitados\User;
use invitados\Http\Requests;
use invitados\invitados_eventos;
use QrCode;
use File;

class EnviarInvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auxe = $this->encryptText('[B][1]');
        $auxd = $this->decryptText($auxe);

         echo($auxd);
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

    public function EnviarMail($invitado_id,$invitado_nombre, $invitado_apellido, $inveve,$toemail,$relacionador_nombre,$evento_nombre){
      $qrFile = public_path('tmp\\' . $inveve . '.png');
      $encrypt = $this->encryptText('[B].['.$inveve.']');
      QrCode::format('png')->size(200)->generate($encrypt, $qrFile);

      Mail::queue('emails.welcome', array('nombre' => $invitado_nombre,
          'apellidos' => $invitado_apellido,
          'relacionador' => $relacionador_nombre,
          'evento' => $evento_nombre,
          'qrFile' => $qrFile
        ), function($message) use ($invitado_nombre, $toemail) {
                  $message->to($toemail, $invitado_nombre)->cc('soporte@ticketeg.com.bo', 'TICKETEG')->subject('Bienvenido a Culto, '. $invitado_nombre);
              });

      File::delete($qrFile);
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
          if($key != '_token' && $key != 'evento' && $key != 'evento_nombre' && $key != 'evento_fecha' && $key != 'evento_hora' && $key != 'relacionador_nombre' && $key != 'relacionador_apellido' && $key != 'relacionador_id')
          {
              if(strpos($key, 'key') === false){
              }else{
                  $ids = $requests;
                  $aux = User::find($ids);
                  $invEven = Invitados_eventos::where('evento_id',$request->input('evento'))->where('invitado_id',$ids)->where('relacionador_id',$request->input('relacionador_id'))->update(['estado'=>'1']);
                  $idinve = Invitados_eventos::where('evento_id',$request->input('evento'))->where('invitado_id',$ids)->where('relacionador_id',$request->input('relacionador_id'))->get();

                  $this->EnviarMail($ids,$aux->name,$aux->apellidos, $idinve[0]->id, $aux->email,$request->input('relacionador_nombre'),$request->input('evento_nombre'));

                  /*Mail::send('emails.welcome', [$request->all(),'user' => $aux], function ($message)  use ($aux) {
                      $message->from('soporte@ticketeg.com.bo', 'Laravel');
                      $message->to($aux->email)->cc('soporte@ticketeg.com.bo');
                  });*/
              }
          }
      }
      return Redirect::to('/evento/'.$request->input('evento'));
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


    private function encryptText($plainText) {
      $key = 'XiTo74dOO09N48YeUmuvbL0E';
      $iv = 'V8DOW7Om';
       $enc = mcrypt_encrypt(MCRYPT_3DES, $key, $plainText, MCRYPT_MODE_CBC, $iv);
       return base64_encode($enc);
   }

    private function decryptText($cryptedText) {
      $key = 'XiTo74dOO09N48YeUmuvbL0E';
    /*  $message= base64_decode($cryptedText);

      $iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
      $iv_dec = substr($message, 0, $iv_size);

      $message= substr($message, $iv_size);

      return mcrypt_decrypt(MCRYPT_3DES, $key, $message, MCRYPT_MODE_CBC, $iv_dec);*/


      $iv = 'V8DOW7Om';
     $enc = base64_decode($cryptedText);
     return  mcrypt_decrypt(MCRYPT_3DES, $key, $enc, MCRYPT_MODE_CBC, $iv);
    }
}
