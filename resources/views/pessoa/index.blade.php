@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">  
                <p>UAU, É ISSO MESMO, SEU GRANDISSÍSSIMO FILHO DA PUTA: NATUREZAS *-*<br />
                    AAAAIN, TÁ IGUAL.<br /> PAU NO SEU CU, NÃO GANHO PRA SER CRIATIVO.</p>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 @if(count($naturezas) > 0)
                    <ul>
                        @foreach($naturezas as $natureza)
                            <li><a href="/naturezas/ver/{{$natureza->id}}">{{$natureza->descricao}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>Tá querendo ver o que, arrombado? Não tem nada aqui</p>
                 @endif


                </div>
               
            </div>
             <a href="/naturezas/cadastrar" class="btn btn-primary">Cadastrar natureza</a>
        </div>
    </div>
</div>
@endsection
