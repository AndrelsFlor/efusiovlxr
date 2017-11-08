@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edição de categoria</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/naturezas/atualizar/'.$natureza->id, 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('descricao','Descreve essa categoria bem gostoso pra mim')}}
                        {{Form::text('descricao',$natureza->descricao,['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE CATEGORIA.'])}}
                    </div>
                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
                        <a id="apagar"  href="/naturezas/apagar/{{$natureza->id}}" class="pull-right btn btn-danger">Apagar</a>
                  
                   {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
