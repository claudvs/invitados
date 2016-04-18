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

    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="#" action="#">

                        <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card">
															@if(Session::has('message'))
															<div class="alert alert-success alert-dismissible" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																{{Session::get('message')}}
															</div>
															@endif
                                <div class="header text-center white">Bienvenido a <br>CULTO</div>
                                <div class="content">

                                </div>
                                <div class="footer text-center">
																	<a href="{!!URL::to('/facebook')!!}" class="btn btn-block btn-facebook">
																		<span class="fa fa-facebook"></span> Sign in with Facebook
																	</a>
                                </div>
                            </div>

                        </form>

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
    {!!Html::script('js/registro/light-bootstrap-dashboard.js')!!}
        {!!Html::script('js/registro/demo.js')!!}


    <script type="text/javascript">
        $().ready(function(){
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
