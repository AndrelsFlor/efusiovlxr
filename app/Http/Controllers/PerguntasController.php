<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Questao;
use App\Models\Banca;
use App\Models\Categorium;
use App\Models\Topico;
use App\Models\Natureza;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idProva)
    {
        $prova = Prova::find($idProva);
        $banca = Banca::find($prova->id_banca);
        $topicos = Topico::all();
        $topicoArray = array();
        $categorias = Categorium::all();
        $categoriaArray = array();
        $naturezas = Natureza::all();
        $naturezaArray = array();

        foreach ($topicos as $topico) {
           $topicoArray[$topico->id] = $topico->descricao;
        }

        foreach ($categorias as $categoria) {
           $categoriaArray[$categoria->id] = $categoria->descricao;
        }

        foreach ($naturezas as $natureza) {
           $naturezaArray[$natureza->id] = $natureza->descricao;
        }
        return view('perguntas.create')->with('prova',$prova)
                                        ->with('banca',$banca)
                                        ->with('naturezas',$naturezaArray)
                                        ->with('categorias',$categoriaArray)
                                        ->with('topicos',$topicoArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idProva)
    {
        $this->validate($request,['anexo' => 'image|nullable|max:1999']);


        $prova = Prova::find($idProva);

        if(empty($prova) or is_null($prova)){
            return redirect('/provas');
        }else{

            $enunciado = $request->input('enunciado');
            $opt0 = $request->input('opt0');
            $opt1 = $request->input('opt1');
            $opt2 = $request->input('opt2');
            $opt3 = $request->input('opt3');
            $opt4 = $request->input('opt4');
            $optCorreta = $request->input('optCorreta');
            $categoria = $request->input('categoria');
            $natureza = $request->input('natureza');
            $topico = $request->input('topico');

            if(empty($enunciado) or is_null($enunciado) or empty($opt0) or is_null($opt0) or empty($opt1) or is_null($opt1) or empty($opt2) or is_null($opt2) or empty($opt3) or is_null($opt3) or empty($opt4) or is_null($opt4)){
            
                return redirect('/provas/cadastrar/perguntas/'.$idProva)->with('error','Todos os campos são obrigatórios');


            }else{
                $pergunta = new Questao();

                if($request->hasfile('anexo')){

                    $nomeArquivoComExt = $request->file('anexo')->getClientOriginalName();

                    $nomeArquivo = pathinfo($nomeArquivoComExt, PATHINFO_FILENAME);

                    $ext = $request->file('anexo')->getClientOriginalExtension();

                    $nomeArquivoArmazenar = $nomeArquivo.'_'.time().'.'.$ext;

                    $caminho = $request->file('anexo')->storeAs('public/imagens',$nomeArquivoArmazenar);

                    $pergunta->anexo = $nomeArquivoArmazenar;
                }
             
                $pergunta->enunciado    =   $enunciado;    
                $pergunta->alternativa0 =   $opt0;
                $pergunta->alternativa1 =   $opt1;
                $pergunta->alternativa2 =   $opt2;
                $pergunta->alternativa3 =   $opt3;
                $pergunta->alternativa4 =   $opt4;
                $pergunta->resposta     =   $optCorreta-1;
                $pergunta->id_categoria =   $categoria;
                $pergunta->id_natureza  =   $natureza;
                $pergunta->id_topico    =   $topico;
                $pergunta->id_prova     =   $idProva;

                $pergunta->save();

                return redirect('/provas/cadastrar/perguntas/'.$idProva)->with('success','pergunta cadastrada com sucesso');

            }
           
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
