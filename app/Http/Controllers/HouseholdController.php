<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseholdController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('household.index');
    }

    public function create(){
    	return view('household.create');
    }

    public function store(){
    	return redirect()->route('household.index')->withFlashSuccess(trans('pages.household.saved_household'));
    }

    public function update($id){
        return redirect()->route('household.index')->withFlashSuccess(trans('pages.household.update_household'));
    }

    public function edit(Request $request, $id){
        return view('household.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.household.delete_household'));
    }

    public function preview(){
        return view('household.preview');
    }
}
