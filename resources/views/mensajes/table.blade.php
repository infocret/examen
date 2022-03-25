<table class="table table-responsive" id="mensajes-table">
    <thead>
        <tr>
            <th>Mensaje</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mensajes as $mensaje)
        <tr>
            <td>{!! $mensaje->mensaje !!}</td>
            <td>
                {!! Form::open(['route' => ['mensajes.destroy', $mensaje->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mensajes.show', [$mensaje->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mensajes.edit', [$mensaje->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>