<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
use App\Horario;
use App\Linha;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayMaps = array();
        $campi = Campus::all();
        $linhas = Linha::all();
        foreach($campi as $campus){
            $arrayMaps[$campus->sigla]=$campus->urlMaps;
        }
        $horarios = Horario::all('horario','chegada','campus','linha');
    foreach($horarios as $horario){
        foreach($campi as $campus){
            if($horario->campus == $campus->id){
                $horario->campus = $campus->sigla;
            }
        }
        foreach($linhas as $linha){
            if($horario->linha == $linha->id){
                $horario->linha = $linha->nomeLinha;
            }
        }
    }
    $campi = Campus::all('sigla');
    $linhas = Linha::select('nomeLinha','situacao')->where('situacao','<>','i')->get();
    $campi2 = Campus::all();
    return view('index',[
        'campi' => json_encode($campi, JSON_UNESCAPED_SLASHES),
        'linhas' => json_encode($linhas, JSON_UNESCAPED_SLASHES),
        'horarios' => json_encode($horarios, JSON_UNESCAPED_SLASHES),
        'maps' => json_encode($arrayMaps,JSON_UNESCAPED_SLASHES)],
        compact('campi2')
    );
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
        //
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
        //
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
        //
    }
}
