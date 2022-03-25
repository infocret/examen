<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'e-mail:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Rol Field -->
<div class="form-group">
    {!! Form::label('rol', 'Rol:') !!}
    <p>{!! $user->rol_id !!}</p>
</div>


<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Contraseña:') !!}
    <p>{!! $user->password !!}</p>
</div>
