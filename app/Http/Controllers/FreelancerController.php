<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Category;
use App\Region;
use App\Report;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freelancers = Freelancer::latest()->paginate(6);
        $categories = Category::All();
        $regions = Region::All();
        return view('pages.freelancer.index', compact('freelancers','regions','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        $regions = Region::All();
        return view('pages.freelancer.create',compact('categories','regions'));
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
            'name' => ['required'],
            'citizen' => ['required'],
            'profession' => ['required'],
            'image' => ['required','mimes:jpeg,png,jpg,gif|max:2048'],
        ],$messages);

        
        $freelancer = New Freelancer();
        $freelancer->name = $request->name;
        $freelancer->email = $request->email;
        $freelancer->phone = $request->phone;
        $freelancer->region = $request->region;
        $freelancer->citizenship = $request->citizen;
        $freelancer->profession = $request->profession;
        $freelancer->commune = $request->commune;
        $freelancer->category = $request->category;
        $freelancer->about = $request->about;
        $freelancer->user_id = Auth::user()->id;
        $freelancer->ref = Str::random(9);
        $freelancer->status = 'visible';
        $freelancer->user_ref = Auth::user()->ref;

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $freelancer->image = $filePath;
        }
        $freelancer->save();
        return redirect()->route('freelancers')->with(['status' => 'profile creer avec succes.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        $freelancer = Freelancer::where('ref', $ref)->first();
        return view('pages.freelancer.show', compact('freelancer'));
    }

        /**
     * Display the specified resource for the owner.
     *
     * @param  int  $ref
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $freelancer = Freelancer::where('user_ref', Auth::user()->ref)->first();
        return view('pages.freelancer.dashboard', compact('freelancer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::All();
        $regions = Region::All();
        $freelancer = Freelancer::where('user_id', Auth::user()->id)->first();
        return view('pages.freelancer.edit',compact('categories','regions','freelancer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            'name' => ['required'],
            'citizen' => ['required'],
            'profession' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif|max:2048'],
        ],$messages);

        $freelancer = Freelancer::where('user_id', Auth::user()->id)->first();
        $freelancer->name = $request->name;
        $freelancer->email = $request->email;
        $freelancer->phone = $request->phone;
        $freelancer->region = $request->region;
        $freelancer->citizenship = $request->citizen;
        $freelancer->profession = $request->profession;
        $freelancer->commune = $request->commune;
        $freelancer->category = $request->category;
        $freelancer->about = $request->about;

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $freelancer->image = $filePath;
        }
        $freelancer->save();
        return redirect()->route('freelancers')->with(['status' => 'profile modifier avec succes.']);
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

    /**
     * Filter the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function filterByCategory($freelancer_category)
    {
        $freelancers = Freelancer::where('category', $freelancer_category)->paginate(10);
        $categories = Category::All();
        $regions = Region::All();
        return view('pages.freelancer.index', compact('freelancers','regions','categories'));
    }

    /**
     * Filter the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function filterByRegion($freelancer_region)
    {
        $freelancers = Freelancer::where('region', $freelancer_region)->paginate(10);
        $categories = Category::All();
        $regions = Region::All();
        return view('pages.freelancer.index', compact('freelancers','regions','categories'));
    }
}
