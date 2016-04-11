
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INVITADOS | Login </title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('font-awesome/css/font-awesome.css')!!}
    {!!Html::style('css/animate.css')!!}
    {!!Html::style('css/style.css')!!}

</head>

<body class="gray-bg">
  @if(Session::has('message-error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message-error')}}
  </div>
  @endif
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido a INVITADOS</h2>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                  {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
                    <form class="m-t" role="form" action="index.html">
                        <div class="form-group">
                            {!!Form::text('usuario',null,['class'=>'form-control','placeholder'=>'Usuario', 'required'])!!}
                        </div>
                        <div class="form-group">
                          {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu contraseña'])!!}
                        </div>
                        {!!Form::submit('Iniciar',['class'=>'btn btn-primary block full-width m-b'])!!}
                        <a href="#">
                            <small>Olvidaste tu contraseña</small>
                        </a>
                      {!!Form::close()!!}
                    <p class="m-t">
                        <small>Qubo &copy; 2016</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright QUBO
            </div>
            <div class="col-md-6 text-right">
               <small>© 2016-2016</small>
            </div>
        </div>
    </div>

</body>

</html>
