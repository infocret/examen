@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Mensaje
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mensaje, ['route' => ['mensajes.update', $mensaje->id], 'method' => 'patch']) !!}

                        @include('mensajes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection