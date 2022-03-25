
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('email', 'e-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('lrol', 'Rol:') !!}
    <select name="rol_id" id="rol_id" class="form-control"  required>
    <option value="">Seleccione Rol</option>   
    @if (isset($user)&& !empty($user))  
	    @foreach($roles as $rol)            
	        <option value="{{$rol->id}}"
	         	{{ $user->rol_id == $rol->id ? 'selected="selected"' : '' }} 
	        >{{ $rol->rol }}
	        </option>            
	    @endforeach
    @else 
        @foreach($roles as $rol)            
        <option value="{{$rol->id}}"         
        >{{ $rol->rol }}
        </option>            
    @endforeach
    @endif
    </select>



</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">        
    <input type="hidden" name="remember_token" value="n/a">
</div>


<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
