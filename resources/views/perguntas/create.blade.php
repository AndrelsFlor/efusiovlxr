@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro de Perguntas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <ul class="list-group">
                        <li class="list-group-item">
                                    
                                <b>Prova:&nbsp;</b>{{$prova->descricao}}
                           
                        </li>
                         <li class="list-group-item">
                           
                                <b>Banca:&nbsp;</b>{{$banca->descricao}}
                           
                        </li>
                         <li class="list-group-item">
                           
                                <b>Ano:&nbsp;</b>{{$prova->ano}}
                           
                        </li>
                    </ul>

                    <ul class="list-group">
                    {!! Form::open(['url' => '/provas/gravar/perguntas/'.$prova->id, 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  
                     <div class="form-group">
                        {{Form::label('enunciado','Enuncia essa pergunta pra mim, hmmm')}}
                        {{Form::text('enunciado','',['class' => 'form-control','placeholder' => 'HMMM, ELE DESCREVE PROVA.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('opt0','Opção 1')}}
                        {{Form::text('opt0','',['class' => 'form-control','placeholder' => 'Enunciado da primeira opção.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('opt1','Opção 2')}}
                        {{Form::text('opt1','',['class' => 'form-control','placeholder' => 'Enunciado da segunda opção.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('opt2','Opção 3')}}
                        {{Form::text('opt2','',['class' => 'form-control','placeholder' => 'Enunciado da terceira opção.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('opt3','Opção 4')}}
                        {{Form::text('opt3','',['class' => 'form-control','placeholder' => 'Enunciado da quarta opção.'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('opt4','Opção 5')}}
                        {{Form::text('opt4','',['class' => 'form-control','placeholder' => 'Enunciado da quinta opção.'])}}
                    </div>
                  
                    <div class="form-group">
                        {{Form::label('optCorreta','Opção correta.')}}
                        {{Form::selectRange('optCorreta',1,5,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('topico','Topico.')}}
                        {{Form::select('topico',$topicos,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('categoria','Categoria.')}}
                        {{Form::select('categoria',$categorias,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('natureza','Natureza.')}}
                        {{Form::select('natureza',$naturezas,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('anexo','Anexo')}}
                        {{Form::file('anexo')}}
                    </div>
                 {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
                  <a id="apagar"  href="/provas" class="pull-right btn btn-danger">Sair</a>
                   {!! Form::close() !!}
                   </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
