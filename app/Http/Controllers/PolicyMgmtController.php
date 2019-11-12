<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyMgmtController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('policy_project_mgmt.index');
    }

    public function create(){
    	return view('policy_project_mgmt.create');
    }

    public function store(){
        return redirect()->route('policy.index')->withFlashSuccess(trans('pages.policy_mgmt.saved'));
    }

    public function update($id){
        return redirect()->route('policy.index')->withFlashSuccess(trans('pages.policy_mgmt.updated'));
    }

    public function edit(Request $request, $id){
        return view('policy_project_mgmt.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess('Information Deleted Successfully');
    }

    public function preview($id){
        return view('policy_project_mgmt.preview'.$id);
    }
}
