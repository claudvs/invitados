<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INVITADOS | dashboard</title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-datetimepicker.css')!!}
    {!!Html::style('font-awesome/css/font-awesome.css')!!}
    {!!Html::style('css/jquery.steps.css')!!}
    {!!Html::style('css/plugins/custom.css')!!}
    {!!Html::style('css/plugins/chosen.css')!!}
    {!!Html::style('css/plugins/bootstrap-colorpicker.min.css')!!}
    {!!Html::style('css/plugins/cropper.min.css')!!}
    {!!Html::style('css/plugins/switchery.css')!!}
    {!!Html::style('css/plugins/jasny-bootstrap.min.css')!!}
    {!!Html::style('css/plugins/jquery.nouislider.css')!!}
    {!!Html::style('css/plugins/datepicker3.css')!!}
    {!!Html::style('css/plugins/ion.rangeSlider.css')!!}
    {!!Html::style('css/plugins/ion.rangeSlider.skinFlat.css')!!}
    {!!Html::style('css/plugins/awesome-bootstrap-checkbox.css')!!}
    {!!Html::style('css/plugins/clockpicker.css')!!}
    {!!Html::style('css/plugins/daterangepicker-bs3.css')!!}
    {!!Html::style('css/plugins/select2.min.css')!!}
    {!!Html::style('css/plugins/jquery.bootstrap-touchspin.min.css')!!}
    {!!Html::style('css/animate.css')!!}
    {!!Html::style('css/style.css')!!}




</head>

<body class="">

    <div id="wrapper">
      <nav class="navbar-default navbar-static-side" role="navigation">
          <div class="sidebar-collapse">
              <ul class="nav metismenu" id="side-menu">
                <!--USER PERFIL-->
                  <li class="nav-header">
                      <div class="dropdown profile-element"> <span>
                            {{ HTML::image('img/profile_small.jpg', 'a picture',['class'=>'img-circle']) }}
                               </span>
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{!!Auth::user()->name!!} {!!Auth::user()->apellidos!!}</strong>
                              </span> <span class="text-muted text-xs block">{!!Auth::user()->tipo!!} <b class="caret"></b></span> </span> </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a href="profile.html">Perfil</a></li>
                              <li class="divider"></li>
                              <li><a href="{!!URL::to('/logout')!!}">Salir</a></li>
                          </ul>
                      </div>
                      <div class="logo-element">
                          <a href="{!!URL::to('/dashboard')!!}">INv</a>
                      </div>
                  </li>
                  @if(Auth::user()->tipo == 'Administrador')
                  <li>
                      <a href="index.html"><i class="fa fa-star"></i> <span class="nav-label">Eventos</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level collapse">
                          <li><a href="{!!URL::to('/evento/create')!!}">Registrar Evento</a></li>
                          <li><a href="{!!URL::to('/evento')!!}">Eventos</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Relacionadores</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level collapse">
                          <li><a href="{!!URL::to('/relacionador/create')!!}">Registrar Relacionador</a></li>
                          <li><a href="{!!URL::to('/relacionador')!!}">Relacionadores</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="index.html"><i class="fa fa-send"></i> <span class="nav-label">Email</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level collapse">
                          <li><a href="index.html">Enviar Email</a></li>
                          <li><a href="dashboard_2.html">Ver Enviados</a></li>
                      </ul>
                  </li>
                  @endif
                  @if(Auth::user()->tipo == 'Relacionador')
                  <li>
                      <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Invitados</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level collapse">
                          <li><a href="{!!URL::to('/invitado/create')!!}">Registrar Invitado</a></li>
                          <li><a href="{!!URL::to('/invitado')!!}">Mis Invitados</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="{!!URL::to('/evento')!!}">
                        <i class="fa fa-star"></i>
                        <span class="nav-label">Eventos</span>
                      </a>
                  </li>
                  @endif
              </ul>

          </div>
      </nav>
      @yield('content')



    <!-- Mainly scripts -->


    {!!Html::script('js/jquery-2.1.1.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/inspinia.js')!!}
    {!!Html::script('js/plugins/pace/pace.min.js')!!}
    {!!Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js')!!}
    {!!Html::script('js/chosen.jquery.js')!!}
    {!!Html::script('js/jquery.knob.js')!!}
    {!!Html::script('js/jasny-bootstrap.min.js')!!}
    {!!Html::script('js/jquery.steps.min.js')!!}
    {!!Html::script('js/jquery.validate.min.js')!!}



    {!!Html::script('js/moment.js')!!}
    {!!Html::script('js/bootstrap-datetimepicker.js')!!}
    {!!Html::script('js/jquery.nouislider.min.js')!!}
    {!!Html::script('js/switchery.js')!!}
    {!!Html::script('js/ion.rangeSlider.min.js')!!}
    {!!Html::script('js/icheck.min.js')!!}
    {!!Html::script('js/plugins/metisMenu/jquery.metisMenu.js')!!}
    {!!Html::script('js/bootstrap-colorpicker.min.js')!!}
    {!!Html::script('js/plugins/clockpicker.js')!!}
    {!!Html::script('js/cropper.min.js')!!}
    {!!Html::script('js/moment.min.js')!!}
    {!!Html::script('js/plugins/daterangepicker.js')!!}
    {!!Html::script('js/plugins/select2.full.min.js')!!}

    {!!Html::script('js/jquery.bootstrap-touchspin.min.js')!!}

    <!-- Flot -->
    {!!Html::script('js/plugins/flot/jquery.flot.js')!!}
    {!!Html::script('js/plugins/flot/jquery.flot.tooltip.min.js')!!}
    {!!Html::script('js/plugins/flot/jquery.flot.spline.js')!!}
    {!!Html::script('js/plugins/flot/jquery.flot.resize.js')!!}
    {!!Html::script('js/plugins/flot/jquery.flot.pie.js')!!}

    <!-- Peity -->
    {!!Html::script('js/plugins/peity/jquery.peity.min.js')!!}
    {!!Html::script('js/demo/peity-demo.js')!!}

    <!-- Custom and plugin javascript -->

    {!!Html::script('js/plugins/pace/pace.min.js')!!}

    <!-- jQuery UI -->
    {!!Html::script('js/plugins/jquery-ui/jquery-ui.min.js')!!}


    <!-- GITTER -->
    {!!Html::script('js/plugins/gritter/jquery.gritter.min.js')!!}


    <!-- Sparkline -->
    {!!Html::script('js/plugins/sparkline/jquery.sparkline.min.js')!!}


    <!-- Sparkline demo data  -->
    {!!Html::script('js/demo/sparkline-demo.js')!!}


    <!-- ChartJS-->
    {!!Html::script('js/plugins/chartJs/Chart.min.js')!!}


    <!-- Toastr -->
    {!!Html::script('js/plugins/toastr/toastr.min.js')!!}



</body>

</html>
