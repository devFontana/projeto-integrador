<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SolicitacaoSoftware;
use App\Laboratorio;
use App\Software;
use Carbon\Carbon;

class SolicitacaoSoftwareController extends Controller
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
        if(Auth::user()->type == 'a') {
            $solicitacoes = SolicitacaoSoftware::orderBy('status', 'desc')->get();
        } else {
            $solicitacoes = SolicitacaoSoftware::where('idUsuario', Auth::id())->orderBy('status', 'desc')->get();
        }
        return view('solicitacaoSoftware.index')->with('solicitacoes', $solicitacoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labs = Laboratorio::orderBy('nome', 'asc')->get();
        $sw = Software::orderBy('nome', 'asc')->get();
        return view('solicitacaoSoftware.cadastrar')->with('labs', $labs)->with('sw', $sw);
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
            'nome' => ['nullable', 'regex:/^[a-zA-Z0-9\s]*/'],
            'descricao' => ['nullable', 'regex:/^[a-zA-Z0-9\s]*/'],
            'versao' => ['nullable','regex:/^(\d+\.)*\d/']
        ]);
        $solicitacao = new SolicitacaoSoftware;
        if($request->input('idSoftware') == 0) {
            $sw = new Software;
            $sw->nome = $request->input('nome');
            $sw->descricao = $request->input('descricao');
            $sw->versao = $request->input('versao'); 
            $sw->save();
            $solicitacao->idSoftware = $sw->id;
        } else {
            $solicitacao->idSoftware = $request->input('idSoftware');
        }        
        $solicitacao->idLaboratorio = $request->input('idLaboratorio');
        $solicitacao->dataSolicitacao = Carbon::now()->format('d/m/Y');
        $solicitacao->idUsuario = Auth::id();
        $solicitacao->status = 'Solicitado';
        $solicitacao->save();
        return redirect('solicitacao-software')->with('success', 'Solicitação realizada com sucesso.');
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
        $solicitacao = SolicitacaoSoftware::find($id);
        $solicitacao->status = 'Cancelado';
        $solicitacao->save();
        return redirect('solicitacao-software')->with('success', 'Solicitação cancelada com sucesso.');
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
        
    }

    /**
     * Change SolicitacaoSoftware status
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     * 
     */
    public function updateStatus(Request $request, $id) {
        $solicitacao = SolicitacaoSoftware::find($id);
        $solicitacao->status = $request->input('statusNovo');
        if($solicitacao->status == 'Instalado') {
            $solicitacao->dataInstalaçao = Carbon::now()->toDateString();
        }
        $solicitacao->save();
        return redirect('solicitacao-software')->with('success', 'Status alterado com sucesso.');
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
            $solicitacao = SolicitacaoSoftware::find($id);
            if($solicitacao->status == 'Solicitado') {
                $solicitacao->delete();
            }
            return redirect('solicitacao-software')->with('success', 'Solicitação cancelada com sucesso');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('solicitacao-software')->with('erro','Não foi cancelar a solicitação.');
        }
        
    }
}
