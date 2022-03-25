<!-- Mensaje Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    {!! Form::text('mensaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mensajes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
