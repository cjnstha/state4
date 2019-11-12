<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('contractor.index');
    }

    public function create(){
    	return view('contractor.create');
    }

    public function store(){
        return redirect()->route('contractor.index')->withFlashSuccess(trans('pages.contractor_management.saved'));
    }

    public function update($id){
        return redirect()->route('contractor.index')->withFlashSuccess(trans('pages.contractor_management.updated'));
    }

    public function edit(Request $request, $id){
        return view('contractor.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.contractor_management.contractor_deleted'));
    }

    public function show(){
        return view('contractor.preview');
    }
}
