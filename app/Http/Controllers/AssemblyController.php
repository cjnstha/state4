<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssemblyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('assembly.index');
    }

    public function create(){
    	return view('assembly.create');
    }

    public function store(){
        return redirect()->route('assembly.index')->withFlashSuccess(trans('pages.assembly.assembly_saved'));
    }

    public function edit(Request $request, $id){
        return view('assembly.edit'.$id);
    }

    public function update($id){
        return redirect()->route('assembly.index')->withFlashSuccess(trans('pages.assembly.assembly_updated'));

    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.assembly.assembly_deleted'));
    }

    public function show($id){
        return view('assembly.preview'.$id);
    }
}
