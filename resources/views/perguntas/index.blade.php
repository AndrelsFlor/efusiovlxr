@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">  
                <p>UAU, É ISSO MESMO, SEU GRANDISSÍSSIMO FILHO DA PUTA: PROVAS *-*<br />
                    AAAAIN, TÁ IGUAL.<br /> PAU NO SEU CU, NÃO GANHO PRA SER CRIATIVO.</p>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 @if(count($provas) > 0)
                    <ul>
                        @foreach($provas as $prova)
                            <li><a href="/provas/ver/{{$prova->id}}">{{$$prova->descricao}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>Tá querendo ver o que, arrombado? Não tem nada aqui</p>
                 @endif


                </div>
               
            </div>
             <a href="/provas/cadastrar" class="btn btn-primary">Cadastrar prova</a>
        </div>
    </div>
</div>
@endsection
