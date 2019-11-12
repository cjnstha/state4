<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('education.index');
    }

    public function create(){
    	return view('education.create');
    }

    public function store(){
        return redirect()->route('education.index')->withFlashSuccess(trans('pages.education.saved'));
    }

    public function update($id){
        return redirect()->route('education.index')->withFlashSuccess(trans('pages.education.updated'));
    }

    public function edit(Request $request, $id){
        return view('education.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.education.delete_education'));
    }

    public function preview(){
        return view('education.preview');
    }
}
