<div class="form-group">
  <div class="col-md-6">
    <label>Nombre del Evento</label>
    {!!Form::text('evento_nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del Evento']) !!}
  </div>
  <div class="col-md-6">
    <label>Lugar del Evento</label>
    {!!Form::text('evento_lugar',null,['class'=>'form-control','placeholder'=>'Ingresa el lugar del Evento']) !!}
  </div>
  <div class="col-md-6">
    <label>Fecha del Evento</label>
    <div class='input-group date'>
        {!!Form::text('evento_fecha',null,['class'=>'form-control','id'=>'datetimepicker4','placeholder'=>'Ingresa la fecha del Evento']) !!}
        <span class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </span>
      </div>
  </div>
  <div class="col-md-6">
    <label>Hora del Evento</label>
    <div class="input-group clockpicker" data-autoclose="true">
      {!!Form::text('evento_hora',null,['class'=>'form-control','id'=>'datetimepicker4','placeholder'=>'Ingresa la hora del Evento']) !!}
        <span class="input-group-addon">
            <span class="fa fa-clock-o"></span>
        </span>
    </div>
  </div>
  <div class="col-md-6">
    <label>Cupos del Evento</label>
    {!!Form::text('evento_cupo',null,['class'=>'form-control'])!!}
  </div>
  <div class="col-md-12">
    <label>Observaciones del Evento</label>
    {!!Form::textarea('evento_observaciones',null,['class'=>'form-control','rows'=>'8','cols'=>'40','placeholder'=>'Ingresa los cupos del Evento']) !!}
  </div>
