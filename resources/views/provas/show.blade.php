@extends('layouts.app')

@section('content')
<?php
    //$caminho =asset('/storage/imagens/');

   // $caminho = "/storage/imagens/".$prova->anexo;
    
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ver prova</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  
                    @if(count($questoes) > 0)
                        @php($i = 0)
                        @php($alternativas = array("a","b","c","d","e"))
                        @foreach($questoes as $questao)
                           

                            @php($i++)
                            @php($respostas = array($questao->alternativa0,$questao->alternativa1,$questao->alternativa2,$questao->alternativa3,$questao->alternativa4))
                            @php($caminho = "/storage/imagens/".$questao->anexo)


                            {{$i}}
                            <ul class="list-group">
                               <li class="list-group-item">
                                           
                                     {{$questao->enunciado}}
                                  
                               </li>

                               <li class="list-group-item">
                                            
                                        <img src="{{ asset($caminho) }}">
                                   
                                </li>
                                @php($j = 0)
                                @foreach($alternativas as $alternativa)
                                    

                                    <li class="list-group-item">
                                        {{$alternativa.")&nbsp;".$respostas[$j]}}
                                    </li>
                                    @php($j++)
                                @endforeach
                                
                               

                                <li class="list-group-item">
                                            
                                    <b>Alternativa Correta:&nbsp;</b>{{$alternativas[$questao->resposta]}}
                                   
                                </li>

                            </ul>
                          
                        @endforeach
                    @else
                        <p>Nenhuma questão cadastrada para esse prova, arrombado</p>
                    @endif
                   
                  
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
