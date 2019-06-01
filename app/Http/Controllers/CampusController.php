<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
class CampusController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campi = Campus::all();

        return view('campi.index', compact('campi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campi.create');
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
            'nomeCampus'=>'required|unique:campuses|max:200',
            'sigla'=>'required'
        ]);
        $campus = new Campus([
            'nomeCampus'=>$request->get('nomeCampus'),
            'sigla'=>$request->get('sigla')
        ]);
        $campus->save();
        return redirect('/campi')->with('success', 'Campus adicionado!');
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
        $campus = campus::find($id);

        return view('campi.edit', compact('campus'));
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
            'nomeCampus'=>'required|max:200',
            'sigla'=>'required'
        ]);

        $campus = Campus::find($id);
        $campus->nomeCampus = $request->get('nomeCampus');
        $campus->sigla = $request->get('sigla');
        $campus->save();

        return redirect('/campi')->with('success','Campus alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = campus::find($id);
        $campus->delete();

     return redirect('/campi')->with('success', 'Campus deletado!');
    }
}
