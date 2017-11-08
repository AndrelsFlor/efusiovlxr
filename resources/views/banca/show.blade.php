@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de banca</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/bancas/atualizar/'.$banca->id, 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('descricao','Descreve essa banca bem gostoso pra mim')}}
                        {{Form::text('descricao',$banca->descricao,['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE BANCA.'])}}
                    </div>
                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
                        <a id="apagar"  href="/bancas/apagar/{{$banca->id}}" class="pull-right btn btn-danger">Apagar</a>
                  
                   {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
