<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.profile');
    }

    public function update(Request $request)
    {
        $messages = 
        [
          'required' => 'Ce champ est obligatoire.',
        ];
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' =>'required'
        ],$messages);
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image'))
        {
            $user->image = $request->image;
        }
        $user->save();
        return redirect()->route('home')->with(['status' => 'profile modifier avec succes.']);

    }
}
