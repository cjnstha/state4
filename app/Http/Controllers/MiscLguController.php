<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MiscLgu;
use App\Models\MiscDistrict;
use App\Http\Requests\Backend\MiscLgu\CreateMiscLguRequest;
use App\Http\Requests\Backend\MiscLgu\EditMiscLguRequest;
use App\Http\Requests\Backend\MiscLgu\DeleteMiscLguRequest;

class MiscLguController extends Controller
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
        $posts= MiscLgu::all();
        return view('misc-lgu.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateMiscLguRequest $request)
    {
        $districts = MiscDistrict::pluck('name','id');
        return view('misc-lgu.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMiscLguRequest $request)
    {
        $this->validate($request,[
            'district_id' => 'required',
            'name' => 'required',
            
        ]);
        MiscLgu::create($request->all());
        return redirect()->route('misc-lgu.index')->withFlashSuccess('Local Government Unit has been added successfully.');
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
    public function edit(EditMiscLguRequest $request, $id)
    {
        $posts = MiscLgu::findOrFail($id);
        $districts = MiscDistrict::pluck('name','id');

        return view('misc-lgu.edit', compact('posts','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMiscLguRequest $request, $id)
    {
         $this->validate($request,[
            'district_id' => 'required',
            'name' => 'required',
           
        ]);
        $lgu = MiscLgu::findOrFail($id);
        $lgu->update($request->all());
        return redirect()->route('misc-lgu.index')->withFlashSuccess('Local Government Unit is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteMiscLguRequest $request, $id)
    {
        MiscLgu::destroy($id);
        return redirect()->route('misc-lgu.index')->withFlashSuccess('Local Government Unit  is deleted successfully.');
    }
}
