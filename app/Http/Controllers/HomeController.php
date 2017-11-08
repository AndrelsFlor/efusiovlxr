<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = auth()->user()->id;
         $pessoa = Pessoa::find($id);
        if(empty($pessoa) or is_null($pessoa)){
            $pessoa = new Pessoa();
            $pessoa->id_usuario = $id;
            $pessoa->nome = auth()->user()->name;
            $pessoa->save();
        }
        return view('home');
    }
}
