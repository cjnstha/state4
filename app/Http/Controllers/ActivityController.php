<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Requests\Backend\Activity\CreateActivityRequest;
use App\Http\Requests\Backend\Activity\EditActivityRequest;
use App\Http\Requests\Backend\Activity\DeleteActivityRequest;

class ActivityController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Activity::all();
        return view('activity.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivityRequest $request)
    {
        $this->validate($request,[
            'name' => 'required',
            
        ]);
        Activity::create($request->all());
        return redirect()->route('activity.index')->withFlashSuccess('Activity has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditActivityRequest $request, $id)
    {
        $posts = Activity::findOrFail($id);
       
        return view('activity.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditActivityRequest $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
           
        ]);
        $activity = Activity::findOrFail($id);
        $activity->update($request->all());
        return redirect()->route('activity.edit', $id)->withFlashSuccess('Activity profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteActivityRequest $request, $id)
    {
        Activity::destroy($id);
        return redirect()->route('activity.index')->withFlashSuccess('Activity profile is deleted successfully.');
    }
}
