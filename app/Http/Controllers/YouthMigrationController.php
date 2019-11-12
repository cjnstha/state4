<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YouthMigrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('youth_migration.index');
    }

    public function create(){
    	return view('youth_migration.create');
    }

    public function store(){
        return redirect()->route('youth.index')->withFlashSuccess(trans('pages.youth.saved'));
    }

    public function update($id){
        return redirect()->route('youth.index')->withFlashSuccess(trans('pages.youth.updated'));
    }

    public function edit(Request $request, $id){
        return view('youth_migration.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.youth.delete_youth'));
    }
}
