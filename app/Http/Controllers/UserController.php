<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('pages.manager.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.manager.user.create');
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
        
        if(Auth::user()->hasRole('manager'))
        {
        return redirect()->route('manager.users')->with(['status' => 'Compte creer avec succes']);
        }
        if(Auth::user()->hasRole('admin'))
        {
        return redirect()->route('admin.users')->with(['status' => 'Compte creer avec succes']);
        }
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
    public function edit($ref)
    {
        $user = User::where('ref', $ref)->first();
        return view('pages.manager.user.edit', compact('user'));
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        
        $user = User::where('ref', $ref)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        
        if($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $user->image = $filePath;
        }
        $user->save();
        if(Auth::user()->hasRole('manager'))
        {
        return redirect()->route('manager.users')->with(['status' => 'Compte modifier avec succes']);
        }
        if(Auth::user()->hasRole('admin'))
        {
        return redirect()->route('admin.users')->with(['status' => 'Compte modifier avec succes']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref)
    {
        $user = User::where('ref', $ref)->first();
        $user->delete();
        if(Auth::user()->hasRole('manager'))
        {
        return redirect()->route('manager.users')->with(['status' => 'Compte supprimer avec succes']);
        }
        if(Auth::user()->hasRole('admin'))
        {
        return redirect()->route('admin.users')->with(['status' => 'Compte supprimer avec succes']);
        }
    }
}
