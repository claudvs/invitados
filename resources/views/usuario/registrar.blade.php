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
                    <h2>Registrar Relacionador</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Relacionador</a>
                        </li>
                        <li class="active">
                            <strong>Registrar</strong>
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
                              <h5>Formulario de Registro de Relacionador<small></small></h5>
                          </div>
                          <div class="ibox-content">
                              <div class="row">
                                  <div class="col-sm-12">
                                    @include('alerts.request')
                                    {!!Form::open(['route'=>'relacionador.store','method'=>'POST','files'=>true])!!}
                                      @include('usuario.forms.users')
                                      <div class="col-md-12">
                                        <br>
                                        {!!Form::submit('Registrar',['class'=>'btn btn-info']) !!}
                                      </div>
                                    </div>
                                    </div>
                                    {!!Form::close()!!}
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {!!Html::script('js/jquery-2.1.1.js')!!}
          <script>
            $(document).ready(function(){

              $('#daterelacionadores').datetimepicker();
              $('.clockpicker').clockpicker();

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
              });
            });
          </script>
@stop
