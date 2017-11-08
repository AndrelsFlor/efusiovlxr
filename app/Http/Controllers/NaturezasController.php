<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Natureza;

class NaturezasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $naturezas = Natureza::all();
       return view('natureza.index')->with('naturezas',$naturezas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('natureza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->input('descricao')) or is_null($request->input('descricao'))){
            return redirect('/naturezas/cadastrar')->with('error',"preenche essa merda direito");
       }else{
            $descricao = $request->input('descricao');
           
            $natureza = new Natureza();
            $natureza->descricao = $descricao;
            $natureza->save();

            return redirect('/naturezas')->with('success','EITA CARAIO, CADASTROU ESSA DESGRAÇA');
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
        $natureza = Natureza::find($id);

        if(empty($natureza) or is_null($natureza)){
            return redirect('/naturezas');
        }else{
            return view('natureza.show')->with('natureza',$natureza);
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
       $natureza = Natureza::find($id);

       if(empty($natureza) or is_null($natureza)){
         return redirect('/naturezas');
       }else{

            $descricao = $request->input('descricao');
            $natureza->descricao = $descricao;
            $natureza->save();

            return redirect('/naturezas')->with('success','8====================D');
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
        $natureza = Natureza::find($id);

        if(empty($natureza) or is_null($natureza)){
          return redirect('/naturezas');
        }else{
            $natureza->delete();
            return redirect('/naturezas');
        }
    }
}
