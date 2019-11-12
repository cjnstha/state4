<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetMgmtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('budget_mgmt.index');
    }

    public function create(){
    	return view('budget_mgmt.create');
    }

    public function store(){
        return redirect()->route('budget.index')->withFlashSuccess(trans('pages.budget_mgmt.saved'));
    }

    public function update($id){
        return redirect()->route('budget.index')->withFlashSuccess(trans('pages.budget_mgmt.updated'));
    }

    public function edit(Request $request, $id){
        return view('budget_mgmt.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess('Information Deleted Successfully');
    }

    public function preview(){
        return view('budget_mgmt.preview');
    }
}
