<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linha;

class LinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhas = Linha::all();

        return view('linhas.index', compact('linhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linhas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomeLinha'=>'required|unique:linhas|max:50',
        ]);
        $linha = new Linha([
            'nomeLinha'=>$request->get('nomeLinha'),
        ]);
        $linha->save();
        return redirect('/linhas')->with('success', 'Linha adicionada!');
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
        $linha = Linha::find($id);

        return view('linhas.edit', compact('linha'));
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
        $request->validate([
            'nomeLinha'=>'required|unique:linhas|max:50',
        ]);

        $linha = Linha::find($id);
        $linha->nomeLinha = $request->get('nomeLinha');
        $linha->save();

        return redirect('/linhas')->with('success','Linha alterada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linha = Linha::find($id);
        $linha->delete();

     return redirect('/linhas')->with('success', 'Linha deletada!');
    }
}
