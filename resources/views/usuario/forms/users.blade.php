<div class="form-group">
  <div class="col-md-6">
    <label>Nombre del Usuario</label>
    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre de la persona']) !!}
  </div>
  <div class="col-md-6">
    <label>Apellido</label>
    {!!Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Ingrese el Apellido de la persona']) !!}
  </div>
  <div class="col-md-6">
    <label>Usuario</label>
    {!!Form::text('usuario',null,['class'=>'form-control','placeholder'=>'Ingrese el Usuario para la persona']) !!}
  </div>
  <div class="col-md-6">
    <label>Contraseña</label>
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese la contraseña']) !!}
  </div>
  <div class="col-md-6">
    <label>CI</label>
    {!!Form::text('ci',null,['class'=>'form-control','placeholder'=>'Ingrese el Carnet de identidad de la persona']) !!}
  </div>
  <div class="col-md-6">
    <label>Nro de celular</label>
    {!!Form::text('nroCelular',null,['class'=>'form-control','placeholder'=>'Ingrese el numero de celular']) !!}
  </div>
  <div class="col-md-6">
    <label>Fecha del Nacimiento</label>
    <div class='input-group date'>
        {!!Form::text('fechanac',null,['class'=>'form-control','id'=>'daterelacionadores','placeholder'=>'Fecha de nacimiento']) !!}
        <span class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </span>
      </div>
  </div>
  <div class="col-md-6">
    <label>Correo Electronico</label>
    {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese el correo electronico de la persona']) !!}
  </div>
  <div class="col-md-12">
    <label>Sexo</label>
    {!!Form::select('sexo', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), null, ['class'=>'form-control','placeholder' => 'Sexo'])!!}
  </div>
