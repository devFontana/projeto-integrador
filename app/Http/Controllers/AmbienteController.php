<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambiente;
use App\Sala;
use App\Laboratorio;
use App\Localizacao;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localizacoes = Localizacao::orderBy('local', 'desc')->get();
        return view('ambiente.listar')->with('locais', $localizacoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizacoes = Localizacao::orderBy('local', 'desc')->get();
        return view('ambiente.cadastrarSala')->with('localizacoes', $localizacoes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sala = new Sala();
        $sala->nroVagas = $request->input('nroVagas');
        if ($request->has('temProjetor')) {
            $sala->temProjetor = true;    
        } else {
            $sala->temProjetor = false;
        }
        $sala->save();
     
        $ambiente = new Ambiente();
        $ambiente->nome = $request->input('nome');
        $ambiente->idLocalizacao = $request->input('idLocalizacao');
        $ambiente->save();

            $sala->ambiente()->save($sala);
        
        return redirect('/ambientes');
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
