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
                                <th>User</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Nro de celular</th>
                                <th>Estado</th>
                                <th>Operaciones</th>
                            </tr>
                            </thead>
                            @foreach($usuarios as $usuario)
                            <tbody>
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->apellidos}}</td>
                                <td>{{$usuario->usuario}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->tipo}}</td>
                                <td>{{$usuario->nroCelular}}</td>
                                <td>{{$usuario->estado}}</td>
                                <td>
                                  {!!link_to_route('relacionador.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn btn-info'])!!}
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
