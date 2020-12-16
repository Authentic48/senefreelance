<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use App\Category;
use App\Region;
class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $messages = 
        [
          'required' => 'Ce champ est obligatoire.',
        ];
        $request->validate([
            'term' => ['required'],
        ],$messages);

        $freelancers = Freelancer::query()
                        ->where('name','Like', "%{$request->term}%")
                        ->orWhere('category','Like', "%{$request->term}%")
                        ->orWhere('profession','Like', "%{$request->term}%")
                        ->orWhere('region','Like', "%{$request->term}%")
                        ->orWhere('commune','Like', "%{$request->term}%")
                        ->paginate(6);
        
        $categories = Category::All();
        $regions = Region::All();
        return view('pages.freelancer.index', compact('freelancers','regions','categories'));
    }

}
