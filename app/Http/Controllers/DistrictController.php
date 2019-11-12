<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Districts;
use App\Models\Zone;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $posts= District::all();
        $districts = Districts::select('district_id','district_name')->get();
                
        return view('district.index', compact('posts','districts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::pluck('zone_name', 'zone_id');
        $districts = Districts::all();

        return view('district/create', compact('zones', 'districts'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request,[
            'district_id' => 'required',
            'zone_id' => 'required',
            'population' => 'required',
            'vdc' => 'required',
            'hdi' => 'required|numeric',
            'poverty_in' => 'required|numeric',
            'vdc_detail' => 'required|mimes:xlsx,xlx,xls',
           
            
        ]);
        $input = $request->all();
        
       if($request->hasFile('vdc_detail'))
        {
            $file = $request->file('vdc_detail');
            $extension = $request->file('vdc_detail')->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/district/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $input['vdc_detail'] = $newFileName;
                     $input['original_vdc_detail'] = $featured.'.'.$extension;
                }
        }
        else{
                 $input['vdc_detail'] = '';
                 $input['original_vdc_detail']= '';
            }
            
           
             $event = District::create($input);
         
       return redirect()->route('district.index')->withFlashSuccess('District profile has been added successfully.');
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
    public function edit($id)
    {   
       
        $zones = Zone::pluck('zone_name', 'zone_id');
        $districts = Districts::all();
        $posts = District::findOrFail($id);
        //dd($posts);
        return view('district/edit', compact( 'zones', 'districts','posts'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'district_id' => 'required',
            'zone_id' => 'required',
            'population' => 'required',
            'vdc' => 'required',
            'hdi' => 'required|numeric',
            'poverty_in' => 'required|numeric',
            'vdc_detail' => 'mimes:xlsx,xlx,xls',
        ]);
       
        $input = $request->all();
        
        
             $event = District::findOrFail($id);
             
             
             
              if($request->hasFile('vdc_detail'))
        {
            $filePath = public_path().'/files/district/'.$event->vdc_detail;
            \File::delete($filePath);

            $file = $request->file('vdc_detail');
            $extension = $file->getClientOriginalExtension();
            
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/district/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $input['vdc_detail'] = $newFileName;
                    $input['original_vdc_detail'] = $featured.'.'.$extension;
                }
        }
        
             $event->update($input);
       
         return redirect()->route('district.edit', $id)->withFlashSuccess('District profile is updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = District::findOrFail($id);
        $event->delete();
        return redirect('district')->withFlashSuccess('District profile is deleted successfully.');
    }
    
    
    
 public function downloadFile($filename)
    {   
           $file_path = public_path() .'/files/district/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");




        
    }
}
