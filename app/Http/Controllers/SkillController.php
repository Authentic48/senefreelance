<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Freelancer;
use Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $skills = Skill::where('freelancer_id', $profile->id)->get();
        return view('pages.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.skills.create');
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
            'name' => ['required'],
            'percentage' => ['required'],
        ],$messages);

        $skill = New Skill();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $skill->freelancer_id = $profile->id;
        $skill->save();
        
        return redirect()->route('competences')->with(['status' => 'competence ajouter avec succes.']);
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
        $skill = Skill::findOrFail($id);
        return view('pages.skills.edit', compact('skill'));
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
            'name' => ['required'],
            'percentage' => ['required'],
        ],$messages);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->save();
        
        return redirect()->route('competences')->with(['status' => 'competence Modifier avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('competences')->with(['status' => 'competence supprimer avec succes.']);
    }
}
