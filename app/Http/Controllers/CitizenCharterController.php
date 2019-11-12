<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenCharterController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('citizen_charter.index');
    }

    public function create(){
    	return view('citizen_charter.create');
    }

    public function store(){
        return redirect()->route('citizen.index')->withFlashSuccess(trans('pages.citizen_charter.citizen_charter_saved'));
    }

    public function edit(Request $request, $id){
        return view('citizen_charter.edit'.$id);
    }

    public function update($id){
        return redirect()->route('citizen.index')->withFlashSuccess(trans('pages.citizen_charter.citizen_charter_updated'));

    }


    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.citizen_charter.citizen_charter_deleted'));
    }

    public function show(){
        return view('citizen_charter.preview');
    }
}
