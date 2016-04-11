<?php

namespace invitados\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class AdminMiddleware
{
    protected $auth;

    public function __construct(Guard $auth){
      $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if($this->auth->user()->tipo != 'Administrador'){
        Session::flash('message-error','Sin privilegios');
        return redirect()->to('/dashboard');
      }
        return $next($request);
    }
}
