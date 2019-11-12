<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiteracyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('literacy.index');
    }

    public function create(){
    	return view('literacy.create');
    }

    public function store(){
        return redirect()->route('literacy.index')->withFlashSuccess(trans('pages.literacy.saved'));
    }
}
