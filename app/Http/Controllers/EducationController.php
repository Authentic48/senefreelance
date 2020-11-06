<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use App\Education;
use Auth;
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $educations = Education::where('freelancer_id', $profile->id)->get();
        return view('pages.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.education.create');
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
            'school' => ['required'],
            'diploma' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
        ],$messages);

        $education = New Education();
        $education->school = $request->school;
        $education->diploma = $request->diploma;
        $education->from = $request->from;
        $education->to = $request->to;
        $profile = Freelancer::where('user_id', Auth::user()->id)->first();
        $education->freelancer_id = $profile->id;
        $education->save();

        return redirect()->route('education')->with(['status' => 'education ajouter avec succes.']);
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
        $education = Education::findOrFail($id);
        return view('pages.education.edit', compact('education'));
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
            'school' => ['required'],
            'diploma' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
        ],$messages);

        $education = Education::findOrFail($id);
        $education->school = $request->school;
        $education->diploma = $request->diploma;
        $education->from = $request->from;
        $education->to = $request->to;
        $education->save();

        return redirect()->route('education')->with(['status' => 'education modifier avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education')->with(['status' => 'education supprimer avec succes.']);
    }
}
