@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Categoria</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/categorias/gravar', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('descricao','Descreve essa categoria bem gostoso pra mim')}}
                        {{Form::text('descricao','',['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE CATEGORIA.'])}}
                    </div>
                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}

                   {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
