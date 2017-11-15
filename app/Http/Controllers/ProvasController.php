<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Banca;
use App\Models\Questao;
class ProvasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provas = Prova::all();

        return view('provas.index')->with('provas',$provas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancas = Banca::all();
        $i = 0;
        $bancaArray = array();

        foreach ($bancas  as $banca) {
           // $aux = array($banca->id => $banca->descricao);
            $bancaArray[$banca->id] = $banca->descricao;
       
        }

       // return $bancaArray;
        return view('provas.create')->with('bancas',$bancaArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $ano = $request->input('ano');
        $descricao = $request->input('descricao');
        $banca = $request->input('banca');
       // return $ano;

        if(empty($descricao) or is_null($descricao) or empty($banca) or is_null($banca)){
            return redirect('/provas/cadastrar')->with('error','Todos os campos são obrigatórios');
        }else{
            $prova = new Prova();
            $prova->id_banca = $banca;
            $prova->descricao = $descricao;
            $prova->ano = $ano;

            $prova->save();

            return redirect('/provas/cadastrar/perguntas/'.$prova->id)->with('prova',$prova);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prova =    Prova::find($id);
        $questao =  new Questao();

        $questoes = $questao->where('id_prova','=',$id)->get();

       

        if(empty($prova) or is_null($prova)){
            return redirect('/home');
        }else{
             return view('provas.show')->with('prova',$prova)->with('questoes',$questoes);
        }
       
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
        //
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
