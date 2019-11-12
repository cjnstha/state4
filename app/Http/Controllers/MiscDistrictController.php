<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\MiscDistrict\CreateMiscDistrictRequest;
use App\Http\Requests\Backend\MiscDistrict\DeleteMiscDistrictRequest;
use App\Http\Requests\Backend\MiscDistrict\EditMiscDistrictRequest;
use App\Models\MiscDistrict;
use App\Models\MiscProvince;
use Illuminate\Http\Request;

class MiscDistrictController extends Controller
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
        $posts= MiscDistrict::all();
        return view('misc-district.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateMiscDistrictRequest $request)
    {
        $provinces = MiscProvince::pluck('name', 'id');
        return view('misc-district.create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMiscDistrictRequest $request)
    {
        $this->validate($request,[
            'province_id' => 'required',
            'name' => 'required',
            
        ]);
        MiscDistrict::create($request->all());
        return redirect()->route('misc-district.index')->withFlashSuccess('District has been added successfully.');
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
    public function edit(EditMiscDistrictRequest $request, $id)
    {
        $posts = MiscDistrict::findOrFail($id);
        $provinces = MiscProvince::pluck('name', 'id');

        return view('misc-district.edit', compact('posts','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMiscDistrictRequest $request, $id)
    {
         $this->validate($request,[
            'province_id' => 'required',
            'name' => 'required',
           
        ]);
        $district = MiscDistrict::findOrFail($id);
        $district->update($request->all());
        return redirect()->route('misc-district.index')->withFlashSuccess('District is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteMiscDistrictRequest $request, $id)
    {
        MiscDistrict::destroy($id);
        return redirect()->route('misc-district.index')->withFlashSuccess('District  is deleted successfully.');
    }
}
