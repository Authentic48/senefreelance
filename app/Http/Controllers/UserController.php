<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::where('id', $id)->first();
        return view('pages.profile.edit', compact('user'));
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        
        if($request->has('image'))
        {
            $img = $request->file('profile_image');
            $name = Str::slug($request->name).'_'.time();
            $folder = '/uploads/images/';
                //dd($folder);
            $filePath = $folder . $name. '.' .$img->getClientOriginalExtension();
            $this->uploadOne($img, $folder, 'public', $name);
            $user->profile_image = $filePath;
        }
        $user->save();
        return redirect()->route('home')->with(['status' => 'profile modifier avec succes']);
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
