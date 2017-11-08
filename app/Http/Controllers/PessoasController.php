<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\User;
//use Carbon\Carbon;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
         $pessoa = Pessoa::find($id_usuario);

         if(empty($pessoa) or is_null($pessoa)){
            return redirect('/home');
         }else{
             return view('pessoa.show')->with('pessoa',$pessoa);
         }

        // return $pessoa->id_usuario;
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $nome = $request->input('nome');
        $dataNasc = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('data'));
        $sexo = $request->input('sexo'); 
        //return $request;
        if(empty($nome) or is_null($nome) or empty($sexo) or is_null($sexo) or empty($dataNasc) or is_null($dataNasc)){

            return redirect('/perfil/'.$id)->with('error','VOCÊ TINHA UM TRABALHO.');

        }else{
            $pessoa = Pessoa::find($id);
            if(empty($pessoa) or is_null($pessoa)){
                return redirect('/home');
            }else{
                $pessoa->nome = $nome;
                $pessoa->dt_nascimento =  $dataNasc;
                $pessoa->sexo =$sexo;
                $pessoa->save();

                $usuario = User::find($id);
                $usuario->name = $nome;
                $usuario->save();
                return redirect('/home')->with('success', 'perfil atualizado com sucesso');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
