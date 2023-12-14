<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContaRequest;
use Illuminate\Http\Request;
use App\Models\Conta;

class ContaController extends Controller{
    //
    public function index(){

        $contas = Conta::orderByDesc("valor")->get();
        // dd("$contas");

        return view('contas.index', ['contas' => $contas]);
    }
    
    //
    public function create(){
        return view('contas.create');
    }

    //
    public function store(ContaRequest $request){

        $request->validated();

        $conta = Conta::create($request->all());

        return redirect()->route('conta.show', ['conta' => $conta->id])->with('success', 'Conta criada com sucesso');
    }

    //
    public function show(Conta $conta){
        return view('contas.show', ['conta' => $conta]);
    }

    //
    public function edit(Conta $conta){

        return view('contas.edit', ['conta' => $conta]);
    }
    
    //
    public function update(ContaRequest $request, Conta $conta){
        $request->validated();

        $conta->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'vencimento' => $request->vencimento,
        ]);

        return redirect()->route('conta.show', ['conta' => $conta->id])->with('success', 'Conta editada com sucesso');
    }
    
    //
    public function destroy(Conta $conta){
        $conta->delete();

        return redirect()->route('conta.index')->with('success', 'Conta deletada com sucesso');
    }
}