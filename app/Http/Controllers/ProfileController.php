<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('do_spaces')->putFileAs($folder, $image, $name, 'public');
            $user->image = $filePath;
        }
        $user->save();
        return redirect()->back()->with(['status' => 'profile modifier avec succes.']);

    }
}
