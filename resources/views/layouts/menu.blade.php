

@if (Auth::user()->rol_id == 1)

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

@endif

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('mensajes*') ? 'active' : '' }}">
    <a href="{!! route('mensajes.index') !!}"><i class="fa fa-edit"></i><span>Mensajes</span></a>
</li>


       <li class="{{ Request::is('mensaje.info*') ? 'active' : '' }}">
          <a href="{!! route('mensaje.info') !!}">
          <i class="fa fa-edit"></i><span>Información</span>
          </a>
      </li>
