<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banca;
class BancaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancas = Banca::all();


        return view('banca.index')->with('bancas',$bancas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,['descricao' => 'required']);

         $banca = new Banca();

         $banca->descricao = $request->input('descricao');

         $banca->save();

         return redirect('/bancas')->with('success','UHUL, FILHO DA PUTA, BANCA CRIADA COM SUCESSO.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banca = Banca::find($id);

        return view('banca.show')->with('banca',$banca);

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
       $banca = Banca::find($id);

       $banca->descricao = $request->input('descricao');

       $banca->save();
       return redirect('/bancas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banca = Banca::find($id);

        $banca->delete();
        
        return redirect('/bancas');
    }
}
