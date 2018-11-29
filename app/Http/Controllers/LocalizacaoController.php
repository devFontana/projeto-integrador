<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Localizacao;

class LocalizacaoController extends Controller
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
        $localizacoes = Localizacao::orderBy('local', 'asc')->get();
        return view('localizacao.listar')->with('locais', $localizacoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localizacao.cadastrar');
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
            'local' => ['required', 'regex:/^[a-zA-Z0-9\s]*/'],
            'andar' => 'required|numeric'
        ]);
        $localizacao = new Localizacao;
        $localizacao->local = $request->input('local');
        $localizacao->andar = $request->input('andar');
        $localizacao->save();
        return redirect('/localizacao')->with('success', 'Localização criada com sucesso.');
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
        $localizacao = Localizacao::find($id);
        return view('localizacao.editar')->with('localizacao', $localizacao);
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
            'local' => ['required', 'regex:/^[a-zA-Z0-9\s]*/'],
            'andar' => 'required|numeric'
        ]);
        $localizacao = Localizacao::find($id);
        $localizacao->local = $request->input('local');
        $localizacao->andar = $request->input('andar');
        $localizacao->save();
        return redirect('/localizacao')->with('success', 'Localização atualizada com sucesso.');
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
            $localizacao = Localizacao::find($id);
            $localizacao->delete();
            return redirect('/localizacao')->with('success', 'Localização excluida com sucesso.');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/localizacao')->with('erro', 'Não foi possível excluir a localização.');
        }
        
    }
}
