<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Locacao;
use App\Laboratorio;
use App\Sala;


class LocacaoController extends Controller
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
        $locacoes = Locacao::where('idUser', Auth::id())->orderBy('dataInicio', 'desc')->get();
        $labs = Laboratorio::orderBy('nome', 'asc')->get();
        $salas = Sala::orderBy('nome', 'asc')->get();
        return view('locacao.index')->with('locacoes', $locacoes)->with('locacoes', $locacoes)->with('salas', $salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::orderBy('nome', 'asc')->get();
        $labs = Laboratorio::orderBy('nome', 'asc')->get();
        return view('locacao.cadastrar')->with('salas', $salas)->with('labs', $labs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('dataFim')) {
            $this->validate($request, [
                'dataInicio' => 'required|date_format:d/m/Y|before_or_equal:dataFim',
                'dataFim' => 'required|date_format:d/m/Y|after_or_equal:dataInicio',
                'horaInicio' => 'required|date_format:H:i|before:horaFim',
                'horaFim' => 'required|date_format:H:i',
                'descricao' => 'nullable|string',
            ]);
        } else {
            $this->validate($request, [
                'dataInicio' => 'required|date_format:d/m/Y',                
                'horaInicio' => 'required|date_format:H:i|before:horaFim',
                'horaFim' => 'required|date_format:H:i',
                'descricao' => 'nullable|string',
            ]); 
        }
        $locacao = new Locacao;
        $locacao->dataInicio = $request->input('dataInicio');
        $locacao->horaInicio = $request->input('horaInicio');
        if($request->input('dataFim')) {
            $locacao->dataFim = $request->input('dataFim');
        } else {
            $locacao->dataFim = $request->input('dataInicio');
        }       
        $locacao->horaFim = $request->input('horaFim');
        $ambiente = $request->input('amb');
        if ($ambiente == 'lab') {
            $locacao->idLaboratorio = $request->input('idLaboratorio');
        } else {
            $locacao->idSala = $request->input('idSala');
        }
        $locacao->descricao = $request->input('descricao');
        $locacao->idUser = Auth::id();
        $locacao->save();
        return redirect('/locacao')->with('success', 'Locação criada com sucesso.');
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
        try{
            $locacao = Locacao::find($id);
            $locacao->delete();
            return redirect('/locacao')->with('success', 'Locação cancelada com sucesso.');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/locacao')->with('erro', 'Não foi possível cancelar a locação.');
        }
        
    }
}
