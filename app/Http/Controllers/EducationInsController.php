<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationInsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('educational_ins.index');
    }

    public function create(){
    	return view('educational_ins.create');
    }

    public function store(){
        return redirect()->route('educational.index')->withFlashSuccess(trans('pages.educational.saved'));
    }

    public function edit(Request $request, $id){
        return view('educational_ins.edit'.$id);
    }

    public function update($id){
        return redirect()->route('educational.index')->withFlashSuccess(trans('pages.educational.updated'));
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.educational.educational_deleted'));
    }

}
