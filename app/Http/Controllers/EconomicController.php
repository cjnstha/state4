<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EconomicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('economic.index');
    }
    
    public function create(){
    	return view('economic.create');
    }

    public function store(){
        return redirect()->route('eco.index')->withFlashSuccess(trans('pages.economic.saved'));
    }

    public function update($id){
        return redirect()->route('eco.index')->withFlashSuccess(trans('pages.economic.updated'));
    }

    public function edit(Request $request, $id){
        return view('economic.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.economic.economic_deleted'));
    }

    public function preview(){
        return view('economic.preview');
    }
}
