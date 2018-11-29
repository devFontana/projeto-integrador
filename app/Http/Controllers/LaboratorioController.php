<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localizacao;
use App\Laboratorio;

class LaboratorioController extends Controller
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
        $laboraorio = Laboratorio::orderBy('nome', 'asc')->get();
        return view('laboratorio.index')->with('laboratorios', $laboraorio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizacoes = Localizacao::orderBy('local', 'asc')->get();
        return view('laboratorio.cadastrar')->with('localizacoes', $localizacoes);
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
            'nroComputadores' => 'required|numeric'
        ]);
        $lab = new Laboratorio;
        $lab->nome = $request->input('nome');
        $lab->nroComputadores = $request->input('nroComputadores');
        $lab->idLocalizacao = $request->input('idLocalizacao');
        
        $lab->save();
        return redirect('laboratorio')->with('success', 'Laboratorio criado com sucesso.');
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
        $laboratorio = Laboratorio::find($id);
        return view('laboratorio.editar')->with('laboratorio', $laboratorio)->with('localizacoes', $localizacoes);
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
            'nroComputadores' => 'required|numeric'
        ]);
        $lab = Laboratorio::find($id);
        $lab->nome = $request->input('nome');
        $lab->nroComputadores = $request->input('nroComputadores');
        $lab->idLocalizacao = $request->input('idLocalizacao');
        
        $lab->save();
        return redirect('laboratorio')->with('success', 'Laboratorio atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Laboratorio::find($id);
        $lab->delete();
        return redirect('/laboratorio')->with('success', 'Laboratório excluido com sucesso.');
    }
}
