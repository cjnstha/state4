<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JudicialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('judicial.index');
    }

    public function create(){
    	return view('judicial.create');
    }

    public function store(){
        return redirect()->route('judicial.index')->withFlashSuccess(trans('pages.judicial.saved'));
    }

    public function update($id){
        return redirect()->route('judicial.index')->withFlashSuccess(trans('pages.judicial.updated'));
    }

     public function edit(Request $request, $id){
        return view('judicial.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.judicial.delete_info'));
    }

    public function preview(){
        return view('judicial.preview');
    }
}
