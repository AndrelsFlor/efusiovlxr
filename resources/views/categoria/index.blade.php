@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">  UAU, É ISSO MESMO, SEU GRANDISSÍSSIMO FILHO DA PUTA: CATEGORIAIS *-*<br>
                    AAAAIN, TÁ IGUAL. PAU NO SEU CU, NÃO GANHO PRA SER CRIATIVO.
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 @if(count($categorias) > 0)
                    <ul>
                        @foreach($categorias as $categoria)
                            <li><a href="/categorias/ver/{{$categoria->id}}">{{$categoria->descricao}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>Tá querendo ver o que, arrombado? Não tem nada aqui</p>
                 @endif


                </div>
               
            </div>
             <a href="/categorias/cadastrar" class="btn btn-primary">Cadastrar categoria</a>
        </div>
    </div>
</div>
@endsection
