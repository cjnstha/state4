<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('population.index');
    }

    public function create(){
        return view('population.create');
    }

    public function store(){
        return redirect()->route('population.index')->withFlashSuccess(trans('pages.population.pop_store'));
    }

    public function update($id){
        return redirect()->route('population.index')->withFlashSuccess(trans('pages.population.update_pop'));
    }

    public function edit(Request $request, $id){
        return view('population.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.population.delete_pop'));
    }

    public function preview(){
        return view('population.preview');
    }
}
