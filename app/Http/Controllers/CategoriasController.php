<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorium;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorium::all();
        return view('categoria.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function messages()
    {
        return [
            'descricao.required' => 'Bota uma descrição nessa merda, arrombado do caralho',
            
        ];
    }






    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //$this->validate($request,["descricao" => "required"]);
  

        if(empty($request->input('descricao')) or is_null($request->input('descricao'))){
         return redirect('/categorias/cadastrar')->with('error',"preenche essa merda direito");
       }else{
        $descricao = $request->input('descricao');
        $categoria = new Categorium();
        $categoria->descricao = $descricao;
        $categoria->save();
        return redirect('/categorias')->with('success',"AEEEEEEHOOO");
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
        $categoria = Categorium::find($id);

        if(empty($categoria) or is_null($categoria)){
            return redirect('/categorias');
        }else{
           
             return view('categoria.show')->with('categoria',$categoria);
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
        $categoria = Categorium::find($id);

        if(empty($request->input('descricao')) or is_null($request->input('descricao'))){
         return redirect('/categorias/ver/'.$id)->with('error',"preenche essa merda direito");
       }else{
            $descricao = $request->input('descricao');
            $categoria = Categorium::find($id);
            $categoria->descricao = $descricao;
            $categoria->save();
            return redirect('/categorias')->with('success',"AEEEEEEHOOO,editou");
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
         $categoria = Categorium::find($id);

        if(empty($categoria) or is_null($categoria)){
            return redirect('/categorias');
        }else{
            
             $categoria->delete();
             return redirect('/categorias');
        }
    }
}
