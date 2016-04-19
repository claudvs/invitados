<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Registro a Culto</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />





    <!-- Bootstrap core CSS     -->
    {!!Html::style('css/registro/bootstrap.min.css')!!}
		{!!Html::style('css/bootstrap-social.css')!!}
		{!!Html::style('font-awesome/css/font-awesome.css')!!}
    {!!Html::style('css/registro/demo.css')!!}
    {!!Html::style('css/registro/pe-icon-7-stroke.css')!!}
    {!!Html::style('css/registro/light-bootstrap-dashboard.css')!!}
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#2E3AA1">
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PSK">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      {!!Html::style('css/bootstrap-datetimepicker.css')!!}
      {!!Html::style('css/plugins/chosen.css')!!}
      {!!Html::style('css/plugins/datepicker3.css')!!}
      {!!Html::style('css/plugins/clockpicker.css')!!}
      {!!Html::style('css/plugins/daterangepicker-bs3.css')!!}
      {!!Html::style('css/plugins/select2.min.css')!!}
      {!!Html::style('css/animate.css')!!}
		<style>

		</style>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="collapse navbar-collapse">
        </div>
    </div>
</nav>


<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="purple" data-image="#">
			<div class="title">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-2">
							<div class="mensaje">
								<h2>"Tu mente se cree que eres un nombre, <br> un apellido o una imagen. <br> Sal de tu mente y conócete a ti mismo." <br> Tu <span>iniciacion</span> ha <span>comenzado</span>."</h2>
							</div>
							<div class="logo">
								{{ HTML::image('img/cultologo.png', 'a picture',['class'=>'img-responsive center-block']) }}
							</div>
						</div>
					</div>

				</div>

			</div>
    <!--  you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-2">
                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="">
                              @if(Session::has('message'))
                              <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{Session::get('message')}}
                              </div>
                              @endif
                                @include('alerts.request')
                                {!!Form::open(['route'=>'invitado.store','method'=>'POST'])!!}
                                <div class="content">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label>Nombre y Apellido</label>
																				<div class="input-group">
																					<div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																					{!!Form::text('name',Auth::user()->name,['class'=>'form-control', 'required']) !!}
																				</div>
                                      </div>
                                      <div class="col-md-12">
																				<label>Email</label>
																				<div class="input-group">
																					<div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																					{!!Form::text('email',Auth::user()->email,['class'=>'form-control', 'required']) !!}
																				</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label>Sexo</label>
																				<div class="input-group">
																					  <div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																						{!!Form::select('sexo', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), Auth::user()->sexo, ['class'=>'form-control','placeholder' => 'Sexo'])!!}
																				</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label>Nro de celular</label>
																				<div class="input-group">
																				  <div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																					{!!Form::text('nroCelular',Auth::user()->nroCelular,['class'=>'form-control', 'required']) !!}
																				</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label>Fecha del Nacimiento</label>
																				<div class="input-group">
																				  <div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																					<div class='date'>
																							{!!Form::text('fechanac',Auth::user()->fechanac,['class'=>'form-control','id'=>'dateinvitado', 'required']) !!}
																						</div>
																				</div>
                                      </div>
                                      <div class="col-md-12">
                                        <label>Codigo Relacionador</label>
																				<div class="input-group">
																				  <div class="input-group-addon">	{{ HTML::image('img/cultologo.png', 'a picture',['width'=>'25px']) }}</div>
																					{!!Form::text('codigo',null,['class'=>'form-control', 'required']) !!}
																				</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="footer text-center">
                                  {!!Form::submit('Registrar',['class'=>'btn btn-info btn-fill btn-wd']) !!}
                                </div>
                                {!!Form::close()!!}
                            </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="full-page-background" style="display: block; background-image: url({{ URL::to('/img/boliche.jpg') }});"></div>

    </div>

</div>

</body>

    <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
    {!!Html::script('js/jquery-2.1.1.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}


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

    <script type="text/javascript">
        $().ready(function(){
          $('#dateinvitado').datetimepicker();
          $('.clockpicker').clockpicker();
            lbd.checkFullPageBackgroundImage();

            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46172202-1', 'auto');
      ga('send', 'pageview');

    </script>

</html>
