@extends('layouts.principal')
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
                    <h2>Evento</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>{!!$evento->evento_nombre!!}</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2>{!!$evento->evento_nombre!!}</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        @if($evento->deleted_at == '')
                                        <dt>Estado:</dt> <dd><span class="label label-primary">Activo</span></dd>
                                        @endif
                                        @if($evento->deleted_at != null)
                                        <dt>Estado:</dt> <dd><span class="label label-danger">Inactivo</span></dd>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Creado por:</dt> <dd>Administrador</dd>
                                        <dt>Cupos:</dt> <dd>{!!$evento->evento_cupo!!}</dd>
                                        <dt>Version:</dt> <dd> 	v1.4.2 </dd>
                                    </dl>
                                </div>
                                <!--
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Ultima Actualizacion</dt> <dd>{!!$evento->updated_at!!}</dd>
                                        <dt>Creacion</dt> <dd> 	{!!$evento->updated_at!!} </dd>
                                        <dt>Participants:</dt>
                                        <dd class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                        </dd>
                                    </dl>
                                </div>-->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Cupos de invitacion:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                            <!--
                                            <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                          -->
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                              <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                    <h2>Por invitar</h2>
                                    <small>Para tener mas invitados tienes que registrarlos</small>
                                    {!!Form::open(['route'=>'invitado_eventos.store','method'=>'POST'])!!}
                                      <ul class="todo-list m-t small-list">

                                      @foreach($misinvitados as $invitado)
                                      <li>
                                        {!!Form::checkbox('invitado'.$invitado->id, $invitado->id,['class'=>'check-link'])!!}
                                        <span class="m-l-xs">{!!$invitado->name!!} {!!$invitado->apellidos!!}</span>
                                      </li>
                                      @endforeach
                                    </ul>
                                    <div class="text-center m-t-md">
                                        {!!Form::submit('Agregar Invitados',['class'=>'btn btn btn-primary']) !!}
                                    </div>
                                    {!!Form::close()!!}
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                    <h2>Ya invitados</h2>
                                    <small>Para tener mas invitados tienes que registrarlos</small>
                                    <ul class="todo-list m-t small-list">
                                      <li>
                                        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                        <span class="m-l-xs todo-completed">Buy a milk</span>
                                      </li>
                                      <li>
                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">Send documents to Mike</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="wrapper wrapper-content project-manager">
                    <h4>{!!$evento->evento_nombre!!}</h4>

                    <p class="small">
                      {!!$evento->evento_observaciones!!}
                    </p>
                    <!--
                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i> High priority</span>
                    </p>
                    <h5>Project tag</h5>
                    <ul class="tag-list" style="padding: 0">
                        <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
                        <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
                    </ul>
                    <h5>Project files</h5>
                    <ul class="list-unstyled project-files">
                        <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                        <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                        <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                    </ul>
                  -->

                </div>
            </div>
        </div>
        </div>
        </div>

@stop
