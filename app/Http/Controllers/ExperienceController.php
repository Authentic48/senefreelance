<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
use App\Freelancer;
use Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $experiences = Experience::where('freelancer_id', $profile->id)->get();
        return view('pages.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.experience.create');
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
            'company' => ['required'],
            'position' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
        ],$messages);

        $experience = New Experience();
        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->from = $request->from;
        $experience->to = $request->to;
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $experience->freelancer_id = $profile->id;
        $experience->save();

        return redirect()->route('experiences')->with(['status' => 'experience ajouter avec succes.']);
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
        $experience = Experience::findOrFail($id);
        return view('pages.experience.edit', compact('experience'));
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
            'company' => ['required'],
            'position' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
        ],$messages);

        $experience = Experience::findOrFail($id);
        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->from = $request->from;
        $experience->to = $request->to;
        $experience->save();

        return redirect()->route('experiences')->with(['status' => 'experience modifier avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('experiences')->with(['status' => 'experience supprimer avec succes.']);
    }
}
