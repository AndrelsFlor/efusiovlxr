@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   Bem-vindo ao crudnator do euaprovado. Confira, abaixo, ações que você pode fazer, pau no rabo.
                <ul>
                    <li><a href="/bancas">Bancas</a></li>
                    <li><a href="/categorias">Categorias</a></li>
                    <li><a href="/naturezas">Naturezas</a></li>
                    <li><a href="/provas">Provas</a></li>
                </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
