<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ministry;

class MinistryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
    	$ministries = Ministry::get();
    	return view('ministry.index',compact('ministries'));
    }

    public function create()
    {
    	return view('ministry.create');
    }

    public function store(Request $request)
    {
    	Ministry::create($request->all());
    	return redirect()->route('ministry.index')->withFlashSuccess('Ministry is created successfully.');
    }

    public function edit($id)
    {
    	$ministry = Ministry::find($id);
    	return view('ministry.edit',compact('ministry'));
    }

    public function update(Request $request, $id)
    {
    	$ministry = Ministry::find($id);
    	$ministry->name = $request->name;
    	$ministry->save();
    	return redirect()->route('ministry.index')->withFlashSuccess('Ministry is updated successfully.');
    }

    public function destroy($id)
    {
    	Ministry::destroy($id);
    	return redirect()->route('ministry.index')->withFlashSuccess('Ministry is deleted successfully.');
    }
}
