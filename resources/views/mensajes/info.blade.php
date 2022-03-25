@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Información
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('mensajes.info_fields')
                    <a href="{!! route('mensajes.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
