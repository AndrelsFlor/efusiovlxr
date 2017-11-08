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
               
                    {!! Form::open(['url' => '/perfil/atualizar/'.$pessoa->id_usuario, 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('nome','Nome')}}
                        {{Form::text('nome',$pessoa->nome,['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE NOME.'])}}
                       

                    </div>
                    <div class="form-group">
                         {{Form::label('data','Data de nascimento')}}
                        {{Form::dateTime( 'data', $pessoa->dt_nascimento->format('d/m/Y'), ['class'=>'form-control'])}}
                    </div>
                     <div class="form-group">
                       {{Form::label('sexo','Sexo')}}
                         {{Form::select('sexo', array('m' => 'Masculino', 'f' => 'Feminino'),['class' => 'form-control'])}}
                    </div>

                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
                       
                  
                   {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
