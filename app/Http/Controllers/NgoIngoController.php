<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NgoIngoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('ngo_ingo.index');
    }

    public function create(){
    	return view('ngo_ingo.create');
    }

    public function store(){
        return redirect()->route('ngoingo.index')->withFlashSuccess(trans('pages.ngo_ingo.saved'));
    }

    public function update($id){
        return redirect()->route('ngoingo.index')->withFlashSuccess(trans('pages.ngo_ingo.updated'));
    }

    public function edit(Request $request, $id){
        return view('ngo_ingo.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.ngo_ingo.ngo_ingo_deleted'));
    }

    public function show(){
        return view('ngo_ingo.preview');
    }
}
