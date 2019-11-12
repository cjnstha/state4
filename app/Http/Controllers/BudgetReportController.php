<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('budget_report.index');
    }

    public function create(){
    	return view('budget_report.create');
    }

    public function edit(Request $request, $id){
        return view('budget_report.edit'.$id);
    }

    public function destroy(Request $request, $id){
        return redirect()->back()->withFlashSuccess(trans('pages.municipality_report.delete_report'));
    }
}
