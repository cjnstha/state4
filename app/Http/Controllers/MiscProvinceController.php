<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MiscProvince;
use App\Http\Requests\Backend\MiscProvince\CreateMiscProvinceRequest;
use App\Http\Requests\Backend\MiscProvince\EditMiscProvinceRequest;
use App\Http\Requests\Backend\MiscProvince\DeleteMiscProvinceRequest;

class MiscProvinceController extends Controller
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
        $posts= MiscProvince::all();
        return view('misc-province.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateMiscProvinceRequest $request)
    {
      
        return view('misc-province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMiscProvinceRequest $request)
    {
        $this->validate($request,[
            'name' => 'required',
            
        ]);
        MiscProvince::create($request->all());
        return redirect()->route('misc-province.index')->withFlashSuccess('Province has been added successfully.');
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
    public function edit(EditMiscProvinceRequest $request, $id)
    {
        $posts = MiscProvince::findOrFail($id);
       
        return view('misc-province.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMiscProvinceRequest $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
           
        ]);
        $province = MiscProvince::findOrFail($id);
        $province->update($request->all());
        return redirect()->route('misc-province.index')->withFlashSuccess('Province is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteMiscProvinceRequest $request, $id)
    {
        MiscProvince::destroy($id);
        return redirect()->route('misc-province.index')->withFlashSuccess('Province  is deleted successfully.');
    }
}
