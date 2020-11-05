<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Category;
use App\Subcategory;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.freelancer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        $subcategories = Subcategory::All();
        return view('pages.freelancer.create',compact('categories','subcategories'));
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
            'email' => ['required'],
            'phone' => ['required'],
            'region' => ['required'],
            'commune' => ['required'],
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required'],
            'citizen' => ['required'],
            'profession' => ['required'],
            'image' => ['required','mimes:jpeg,png,jpg,gif|max:2048'],
        ],$messages);

        dd($request->All());
        $freelancer = New Freelancer();
        $freelancer->name = $request->name;
        $freelancer->email = $request->email;
        $freelancer->phone = $request->phone;
        $freelancer->region = $request->region;
        $freelancer->citizen = $request->citizen;
        $freelancer->profession = $request->profession;
        $freelancer->commune = $request->commune;
        $freelancer->category = $request->category;
        $freelancer->sub_category = $request->sub_category;
        $freelancer->user_id = Auth::user()->id;
        $freelancer->ref = Str::time();
        $freelancer->status = 'visible';

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $freelancer->image = $filePath;
        }
        $freelancer->save();
        return redirect()->back()->with(['status' => 'profile ajouter avec succes.']);
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
