<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::All();
        return view('pages.formation.index', compact('formations'));
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
        $messages = 
        [
          'required' => 'Ce champ est obligatoire.',
        ];
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ],$messages);

        $formation = New Formation();
        $formation->name = $request->name;

        $formation->save();
        return redirect()->back()->with(['status' => 'categorie ajouter avec succes.']);
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
        $formation = Formation::findOrFail($id);
        return view('pages.formation.edit', compact('formation'));
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
        $messages = 
        [
          'required' => 'Ce champ est obligatoire.',
        ];
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ],$messages);

        $formation = Formation::findOrFail($id);
        $formation->name = $request->name;
        $formation->save();
        return redirect()->route('formations')->with(['status' => 'categorie modifier avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation =Formation::findOrFail($id);
        $formation->delete();

        return redirect()->route('formations')->with(['status' => 'formation supprimer avec succes.']);
    }
}
