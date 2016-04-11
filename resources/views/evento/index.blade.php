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
            <h2>Registrar Evento</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="#">Eventos</a>
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
                        <h5>Eventos</h5>
                    </div>
                    <div class="ibox-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Lugar</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Cupos</th>
                                <th>Observaciones</th>
                                <th>Operaciones</th>
                            </tr>
                            </thead>
                            @foreach($eventos as $evento)
                            <tbody>
                            <tr>
                                <td>{{$evento->id}}</td>
                                <td>{{$evento->evento_nombre}}</td>
                                <td>{{$evento->evento_lugar}}</td>
                                <td>{{$evento->evento_fecha}}</td>
                                <td>{{$evento->evento_hora}}</td>
                                <td>{{$evento->evento_cupo}}</td>
                                <td>{{$evento->evento_observaciones}}</td>
                                <td>
                                  {!!link_to_route('evento.edit', $title = 'Editar', $parameters = $evento->id, $attributes = ['class'=>'btn btn-info'])!!}
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
