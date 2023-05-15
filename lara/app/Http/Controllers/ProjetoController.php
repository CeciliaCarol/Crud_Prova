<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->myProjetos()
        ->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'inicio' => $request->inicio,
            'termino' => $request->termino,
            'responsavel' => $request->responsavel
        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $task = Projeto::findOrFail($id);
        $task->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'inicio' => $request->inicio,
            'termino' => $request->termino,
            'responsavel' => $request->responsavel
        ]);
 
         return redirect (route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $task = Projeto::findOrFail($id);  
        $task->delete();
  
        return redirect (route('dashboard'));
    }
}
