<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecisionProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('decision_progress.index');
    }

    public function create(){
    	return view('decision_progress.create');
    }

    public function store(){
        return redirect()->route('decision_progress.index')->withFlashSuccess(trans('pages.decision_progress.saved'));
    }

    public function update($id){
        return redirect()->route('decision_progress.index')->withFlashSuccess(trans('pages.decision_progress.updated'));
    }

    public function edit(Request $request, $id){
        return view('decision_progress.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.decision_progress.delete_decision'));
    }

    public function preview(){
        return view('decision_progress.preview');
    }
}
