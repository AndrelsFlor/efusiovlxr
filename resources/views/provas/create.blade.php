@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Provas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/provas/gravar', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('descricao','Descreve essa prova bem gostoso pra mim')}}
                        {{Form::text('descricao','',['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE PROVA.'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('banca','Vai safada, seleciona essa banca beem gostoso,vai.')}}
                        {{Form::select('banca',$bancas,['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE BANCA.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('ano','Ano.')}}
                        {{Form::selectRange('ano',1900,date('Y'),['class' => 'form-control'])}}
                    </div>
                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}

                   {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
