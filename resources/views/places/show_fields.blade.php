<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $place->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $place->nombre !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $place->descripcion !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{!! $place->url !!}</p>
</div>

<!-- Celular Field -->
<div class="form-group">
    {!! Form::label('celular', 'Celular:') !!}
    <p>{!! $place->celular !!}</p>
</div>

<!-- Longitud Field -->
<div class="form-group">
    {!! Form::label('longitud', 'Longitud:') !!}
    <p>{!! $place->longitud !!}</p>
</div>

<!-- Latitud Field -->
<div class="form-group">
    {!! Form::label('latitud', 'Latitud:') !!}
    <p>{!! $place->latitud !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $place->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $place->updated_at !!}</p>
</div>

