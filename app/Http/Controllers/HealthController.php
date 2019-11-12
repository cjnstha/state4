<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('health.index');
    }

    public function create(){
    	return view('health.create');
    }

    public function store(){
        return redirect()->route('health.index')->withFlashSuccess(trans('pages.health.saved'));
    }

    public function update($id){
        return redirect()->route('health.index')->withFlashSuccess(trans('pages.health.updated'));
    }

    public function edit(Request $request, $id){
        return view('health.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.health.health_deleted'));
    }

    public function show(){
        return view('health.preview');
    }
}
