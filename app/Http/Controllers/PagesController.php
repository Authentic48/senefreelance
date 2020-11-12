<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PagesController extends Controller
{
    public function welcome()
    {
        $categories = Category::latest()->get();

        return view('pages.welcome', compact('categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function how()
    {
        return view('pages.how');
    }

}
