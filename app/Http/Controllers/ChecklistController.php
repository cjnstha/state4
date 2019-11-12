<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChecklistMgmt;
use App\Http\Requests\Backend\ChecklistMgmt\CreateChecklistMgmtRequest;
use App\Http\Requests\Backend\ChecklistMgmt\EditChecklistMgmtRequest;
use App\Http\Requests\Backend\ChecklistMgmt\DeleteChecklistMgmtRequest;

class ChecklistController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	$data = ChecklistMgmt::get();
    	return view('checklist_mgmt.index',compact('data'));
    }

    public function create(CreateChecklistMgmtRequest $request){
    	return view('checklist_mgmt.create');
    } 

    public function store(CreateChecklistMgmtRequest $request){
    	$this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            
        ]);
    	$data['title'] = $request->title;
    	$data['description'] = $request->description;
    	ChecklistMgmt::create($data);
    	
    	return redirect()->route('checklist.index')->withFlashSuccess('Checklist Title has been added successfully.');
        
    }

    public function delete(DeleteChecklistMgmtRequest $request, $id){
    	ChecklistMgmt::destroy($id);
        return redirect()->route('checklist.index')->withFlashSuccess('Checklist title is deleted successfully.');

    }

    public function edit(EditChecklistMgmtRequest $request, $id){
    	$data = ChecklistMgmt::findOrFail($id);
    	return view('checklist_mgmt.edit',compact('data'));
    }

    public function update(EditChecklistMgmtRequest $request, $id){
    	$this->validate($request,[
            'title' => 'required',
            'description' => 'required',
           
        ]);
        $checklist = ChecklistMgmt::findOrFail($id);
        $checklist->update($request->all());
        return redirect()->route('checklist.index')->withFlashSuccess('Checklist title is updated successfully.');
    }
}
