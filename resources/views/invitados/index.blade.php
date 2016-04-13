@extends('layouts.principal')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@section('content')
<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
  <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
      <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

  </div>
      <ul class="nav navbar-top-links navbar-right">
          <li>
              <span class="m-r-sm text-muted welcome-message">Bienvenido a INVITADOS Administrador.</span>
          </li>
          <li>
              <a href="login.html">
                  <i class="fa fa-sign-out"></i> Salir
              </a>
          </li>
      </ul>

  </nav>
</div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Relacionadores</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="#">Relacionadores</a>
                </li>

            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">

      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Relacionadores</h5>
                    </div>
                    <div class="ibox-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Relacionador</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Nro de celular</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            @foreach($misinvitados as $invitado)
                            <tbody>
                            <tr>
                                <td>{{$invitado->id}}</td>
                                <td>{{$invitado->name}}</td>
                                <td>{{$invitado->apellidos}}</td>
                                <td>{!!Auth::user()->name!!}</td>
                                <td>{{$invitado->email}}</td>
                                @if($invitado->estado == '1')
                                <td>Activo</td>
                                @endif
                                @if($invitado->estado == '0')
                                <td>Cancelado</td>
                                @endif
                                <td>{{$invitado->nroCelular}}</td>
                                <td>
                                  {!!link_to_route('invitado.show', $title = 'Ver', $parameters = $invitado->id, $attributes = ['class'=>'btn btn-info'])!!}
                                  {!!link_to_route('invitado.edit', $title = 'Editar', $parameters = $invitado->id, $attributes = ['class'=>'btn btn-info'])!!}

                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@stop
