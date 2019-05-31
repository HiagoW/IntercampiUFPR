<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Campus;
use App\Linha;
class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::all();

        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campi = Campus::all();
        $linhas = Linha::all();
        return view('horarios.create', compact('campi'), compact('linhas'));
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
            'horario'=>'required|max:5',
            'linha'=>'required',
            'campus'=>'required'
        ]);
        $horario = new Horario([
            'horario'=>$request->get('horario'),
            'chegada'=>$request->get('chegada'),
            'linha'=>$request->get('linha'),
            'campus'=>$request->get('campus')
        ]);
        $horario->save();
        return redirect('/horarios')->with('success', 'Horario adicionado!');
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
        $horario = horario::find($id);

        return view('horarios.edit', compact('horario'));
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
            'horario'=>'required|max:5',
            'linha'=>'required',
            'campus'=>'required'
        ]);

        $horario = Horario::find($id);
        $horario->horario = $request->get('horario');
        $horario->chegada = $request->get('chegada');
        $horario->linha = $request->get('linha');
        $horario->campus = $request->get('campus');
        $horario->save();

        return redirect('/horarios')->with('success','Horario alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = horario::find($id);
        $horario->delete();

     return redirect('/horarios')->with('success', 'Horario deletado!');
    }
}
