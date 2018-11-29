<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Software;

class SoftwareController extends Controller
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
        $softwares = Software::orderBy('nome', 'asc')->get();
        return view('software.index')->with('softwares', $softwares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software.cadastrar');
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
            'descricao' => ['required', 'regex:/^[a-zA-Z0-9\s]*/'], 
            'versao' => ['required','regex:/^(\d+\.)*\d/']
        ]);
        $software = new Software;
        $software->nome = $request->input('nome');
        $software->descricao = $request->input('descricao');
        $software->versao = $request->input('versao');
        $software->save();
        return redirect('software')->with('success','Software cadastrado com sucesso');
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
        $software = Software::find($id);
        return view('software.editar')->with('software', $software);
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
            'descricao' => 'required|string',
            'versao' => ['required','regex:/^(\d+\.)*\d/']
        ]);
        $software = Software::find($id);
        $software->nome = $request->input('nome');
        $software->descricao = $request->input('descricao');
        $software->versao = $request->input('versao');
        $software->save();
        return redirect('software')->with('success','Software alterado com sucesso');
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
            $software = Software::find($id);
            $software->delete();
            return redirect('\software')->with('success', 'Software excluido com sucesso.');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('\software')->with('erro', 'Não foi possível excluir o software.');
        }
        
    }
}
