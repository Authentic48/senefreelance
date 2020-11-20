<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use App\Region;
use App\Category;
use Auth;

class AdFreeManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freelancers = Freelancer::latest()->paginate(20);
        return view('pages.admin.freelancer.index', compact('freelancers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->ref = substr(number_format(time() * rand(),0,'',''),0,7);
        if($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $user->image = $filePath;
        }
        $user->save();
        
        $role = 'freelancer';
        $userRole = Role::where('name', $role)->first();
        $user->roles()->attach($userRole);
        return redirect()->route('admin.users')->with(['status' => 'Compte creer avec succes']);
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
        return view('pages.admin.freelancer.show', compact('freelancer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ref)
    {
        $categories = Category::All();
        $regions = Region::All();
        $freelancer = Freelancer::where('ref', $ref)->first();
        return view('pages.admin.freelancer.edit', compact('freelancer','categories','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref)
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
            'status' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif|max:2048'],
            'about' =>'required'
        ],$messages);

        $freelancer = Freelancer::where('ref', $ref)->first();
        $freelancer->name = $request->name;
        $freelancer->email = $request->email;
        $freelancer->phone = $request->phone;
        $freelancer->region = $request->region;
        $freelancer->citizenship = $request->citizen;
        $freelancer->profession = $request->profession;
        $freelancer->commune = $request->commune;
        $freelancer->category = $request->category;
        $freelancer->about = $request->about;
        $freelancer->status = $request->status;

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $freelancer->image = $filePath;
        }
        $freelancer->save();

        return redirect()->route('admin.freelancers')->with(['status' => 'profile modifier avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref)
    {
        $freelancer = Freelancer::where('ref', $ref)->first();
        $freelancer->delete();
        return redirect()->route('admin.freelancers')->with(['status' => 'profile supprimer avec succes.']);
    }
}
