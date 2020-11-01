<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory; 
use App\Category;
class SubcategoryController extends Controller
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
        $categories = Category::All();
        return view('pages.categoryandsub.subcat', compact('categories'));
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
            'name' => ['required', 'unique:subcategories'],
            'category_id' => 'required'
        ],$messages);

        $subcategory = New Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->name;
        $subcategory->save();
        return redirect()->back()->with(['status' => 'subcategorie ajouter avec succes.']);
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
        $subcategory = Category::findOrFail($id);
        
        return view('pages.categoryandsub.subcatedit', compact('subcategory'));
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
            'name' => ['required', 'unique:subcategories'],
            'category_id' => 'required'
        ],$messages);

        $subcategory = Category::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->name;
        $subcategory->save();
        return redirect()->back()->with(['status' => 'subcategorie modifer avec succes.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Category::findOrFail($id);
        $subcategory->delete();
        
        return redirect()->back()->with(['status' => 'subcategorie supprimmer avec succes.']);
    }
}