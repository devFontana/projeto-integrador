<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localizacao;
use App\Sala;


class SalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::orderBy('nome', 'asc')->get();
        return view('salas.index')->with('salas', $salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $localizacoes = Localizacao::orderBy('local', 'asc')->get();
        return view('salas.cadastrar')->with('localizacoes', $localizacoes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => ['required', 'regex:/^[a-zA-Z0-9\s]*/'],
            'nroVagas' => 'required|numeric'
        ]);
        $sala = new Sala;
        $sala->nome = $request->input('nome');
        $sala->nroVagas = $request->input('nroVagas');
        $sala->idLocalizacao = $request->input('idLocalizacao');
        if($request->input('temProjetor')==1) {
            $sala->temProjetor = true;
        } else {
            $sala->temProjetor = false;
        }
        $sala->save();
        return redirect('sala')->with('success', 'Sala criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localizacoes = Localizacao::orderBy('local', 'asc')->get();
        $sala = Sala::find($id);
        return view('salas.editar')->with('sala', $sala)->with('localizacoes', $localizacoes);
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
        $this->validate($request, [
            'nome' => ['required', 'regex:/^[a-zA-Z0-9\s]*/'],
            'nroVagas' => 'required|numeric'
        ]);
        $sala = Sala::find($id);
        $sala->nome = $request->input('nome');
        $sala->nroVagas = $request->input('nroVagas');
        $sala->idLocalizacao = $request->input('idLocalizacao');
        if($request->input('temProjetor')==1) {
            $sala->temProjetor = true;
        } else {
            $sala->temProjetor = false;
        }
        $sala->save();
        return redirect('sala')->with('success', 'Sala atualizada com sucesso.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $sala = Sala::find($id);
            $sala->delete();
            return redirect('/sala')->with('success', 'Sala excluida com sucesso.');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/sala')->with('erro', 'Não foi possível excluir a sala.');
        }
        
    }
}
