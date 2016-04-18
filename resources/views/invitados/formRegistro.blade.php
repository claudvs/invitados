<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/bootstrap-datetimepicker.css')!!}
        {!!Html::style('font-awesome/css/font-awesome.css')!!}
        {!!Html::style('css/plugins/chosen.css')!!}
        {!!Html::style('css/plugins/datepicker3.css')!!}
        {!!Html::style('css/plugins/clockpicker.css')!!}
        {!!Html::style('css/plugins/daterangepicker-bs3.css')!!}
        {!!Html::style('css/plugins/select2.min.css')!!}
        {!!Html::style('css/animate.css')!!}

    </head>
    <body>
      @if(Session::has('message'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
      </div>
      @endif
        <div class="container">
            @include('alerts.request')
            <h1>Bienvenido {!!Auth::user()->name!!}</h1>
              {!!Form::open(['route'=>'invitado.store','method'=>'POST'])!!}
              <div class="form-group">
                <div class="col-md-6">
                  <label>Nombre del Usuario</label>
                  {!!Form::text('name',Auth::user()->name,['class'=>'form-control','placeholder'=>'Ingrese el Nombre de la persona']) !!}
                </div>
                <div class="col-md-6">
                  <label>Apellido</label>
                  {!!Form::text('apellidos',Auth::user()->apellidos,['class'=>'form-control','placeholder'=>'Ingrese el Apellido de la persona']) !!}
                </div>
                <div class="col-md-6">
                  <label>Nro de celular</label>
                  {!!Form::text('nroCelular',Auth::user()->nroCelular,['class'=>'form-control','placeholder'=>'Ingrese el numero de celular']) !!}
                </div>
                <div class="col-md-6">
                  <label>Fecha del Nacimiento</label>
                  <div class='input-group date'>
                      {!!Form::text('fechanac',Auth::user()->fechanac,['class'=>'form-control','id'=>'daterelacionadores','placeholder'=>'Fecha de nacimiento']) !!}
                      <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Correo Electronico</label>
                  {!!Form::email('email',Auth::user()->email,['class'=>'form-control','placeholder'=>'Ingrese el correo electronico de la persona']) !!}
                </div>
                <div class="col-md-12">
                  <label>Sexo</label>
                  {!!Form::select('sexo', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), Auth::user()->sexo, ['class'=>'form-control','placeholder' => 'Sexo'])!!}
                </div>
                <div class="col-md-12">
                  <label>Codigo Relacionador</label>
                  {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Ingrese el codigo de relacionador']) !!}
                </div>
                <div class="col-md-12">
                    <br>
                    {!!Form::submit('Registrar',['class'=>'btn btn-info']) !!}
                </div>
              {!!Form::close()!!}
        </div>
      </div>


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
    </body>
</html>
