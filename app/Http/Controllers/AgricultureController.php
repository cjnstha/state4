<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgricultureController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('agriculture.index');
    } 

    public function create(){
    	return view('agriculture.create');
    }  

    public function store(){
    	return redirect()->route('agriculture.index')->withFlashSuccess(trans('pages.agriculture.saved'));
    } 

    public function update($id){
        return redirect()->route('agriculture.index')->withFlashSuccess(trans('pages.agriculture.update'));
    }

    public function edit(Request $request, $id){
        return view('agriculture.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.agriculture.delete'));
    }

    public function preview(){
        return view('agriculture.preview');
    }
}
