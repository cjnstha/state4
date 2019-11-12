<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HdiController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('hdi.index');
    }    

    public function create(){
    	return view('hdi.create');
    }

    public function store(){
        return redirect()->route('hdi.index')->withFlashSuccess(trans('pages.hdi.saved'));
    }

    public function update($id){
        return redirect()->route('hdi.index')->withFlashSuccess(trans('pages.hdi.updated'));
    }

    public function edit(Request $request, $id){
        return view('hdi.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.hdi.delete_hdi'));
    }

    public function preview(){
        return view('hdi.preview');
    }
}
