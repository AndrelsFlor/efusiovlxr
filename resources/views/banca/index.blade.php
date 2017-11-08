@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">  UAU, É ISSO MESMO, SEU GRANDISSÍSSIMO FILHO DA PUTA: BANCAS *-*</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 @if(count($bancas) > 0)
                    <ul>
                        @foreach($bancas as $banca)
                            <li><a href="/bancas/ver/{{$banca->id}}">{{$banca->descricao}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>Tá querendo ver o que, arrombado? Não tem nada aqui</p>
                 @endif


                </div>
               
            </div>
             <a href="/bancas/cadastrar" class="btn btn-primary">Cadastrar banca</a>
        </div>
    </div>
</div>
@endsection
