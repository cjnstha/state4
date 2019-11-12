<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Consultancy;
use App\Models\Expertise;
// use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;
use Response;
// use Redirect;

class RosterController extends Controller
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
        $posts= Roster::all();
        return view('roster.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       // $projects= Project::pluck('project_code','id');
        // $consultancy= Consultancy::pluck('type','id');
         $expertise= Expertise::pluck('name','id');
        return view('roster/create', compact('projects','expertise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator= $this->validate($request,[
            'email'          => 'required|email',
            'p_work'         => 'required',
            'p_perf'         => 'required',
            'expertise_id'   => 'required',
            'fullname' => 'required',
            'contact'        => 'required',
            // 'resume_file'    => 'required|mimes:jpg,jpeg',
            // 'panvat'         => 'required|mimes:jpg,jpeg', 
            // 'otherdoc'       => 'required|mimes:jpg,jpeg',   
        ]);
             $input = Input::all();           

               if(Input::hasFile('resume_file'))
                {
                    $file = Input::file('resume_file');   
                    $destinationPath = public_path(). '/files/roster';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                { 
                    
                    $featured = '';
                }

                  if(Input::hasFile('otherdoc'))
                {

                    $file = Input::file('otherdoc');
                    
                    $destinationPath = public_path(). '/files/roster';
                    $otherdoc = $file->getClientOriginalName();
                    $file->move($destinationPath, $otherdoc);
                }
                else
                { 
                    
                    $otherdoc = '';
                }

                      if(Input::hasFile('panvat'))
                {

                    $file = Input::file('panvat');
                    
                    $destinationPath = public_path(). '/files/roster';
                    $panvat = $file->getClientOriginalName();
                    $file->move($destinationPath, $panvat);
                }
                else
                { 
                    
                    $panvat = '';
                }

                //$input['consultancy_id'] = implode(",", $input['consultancy_id']);
                $input['expertise_id'] = implode(",", $input['expertise_id']);


               $event = Roster::create([
                        'email' => $input['email'],
                        'p_work' => $input['p_work'],
                        'p_perf' => $input['p_perf'],
                        'expertise_id'=> $input['expertise_id'],
                        'resume' => $featured,
                         'panvat' => $panvat,
                        'otherdoc' => $otherdoc,
                        'fullname' =>$input['fullname'],
                         'contact' =>$input['contact']
                        
                ]);
         
            return redirect('roster')->withFlashSuccess('Roster has been added successfully.');
       
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
    {   $posts = Roster::findOrFail($id);
        
        // $projects       = Project::pluck('project_code','id');
        // $consultancy    = Consultancy::pluck('type','id');
        // $consultancy_id  = explode(",", $posts->consultancy_id);
        $expertise= Expertise::pluck('name','id');
        $expertise_id  = explode(",", $posts->expertise_id);
        
       
       return view('roster.edit', compact('posts','projects','expertise','expertise_id'));
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
        // dd($request->all());
          $validator= $this->validate($request,[
            'email' => 'required|email',
            'p_work' => 'required',
            'p_perf' => 'required',
            'expertise_id' => 'required', 
             'resume_file' => 'mimes:jpg,jpeg',   
              'panvat' => 'mimes:jpg,jpeg', 
               'otherdoc' => 'mimes:jpg,jpeg', 
                'fullname' => 'required',
                 'contact' => 'required',         
        ]);
        
          $input = Input::all();
              $filename = Roster::findOrFail($id);
               if(Input::hasFile('resume_file'))
                {  

                    $file = Input::file('resume_file');
                    $destinationPath = public_path(). '/files/roster';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);

                    // delete previous file
                    $fileName= $filename->resume;
                    if (!empty($fileName)) {
                         if (File::exists('public/files/roster/'.$fileName)) {
                            unlink('public/files/roster/'.$fileName);
                            }
                     }
                    }
                    else
                    {
                        if(!empty($filename->resume)){
                            $featured = $filename->resume;
                            }
                        else{
                            $featured = '';
                           
                        }
                    }


                      if(Input::hasFile('otherdoc'))
                {  

                    $file = Input::file('otherdoc');
                    $destinationPath = public_path(). '/files/roster';
                    $otherdoc = $file->getClientOriginalName();
                    $file->move($destinationPath, $otherdoc);

                    // delete previous file
                    $fileName= $filename->otherdoc;
                    if (!empty($fileName)) {
                         if (File::exists('public/files/roster/'.$fileName)) {
                            unlink('public/files/roster/'.$fileName);
                            }
                     }
                    }
                    else
                    {
                        if(!empty($filename->otherdoc)){
                            $otherdoc = $filename->otherdoc;
                            }
                        else{
                            $otherdoc = '';
                           
                        }
                    }

                      if(Input::hasFile('panvat'))
                {  

                    $file = Input::file('panvat');
                    $destinationPath = public_path(). '/files/roster';
                    $panvat = $file->getClientOriginalName();
                    $file->move($destinationPath, $otherdoc);

                    // delete previous file
                    $fileName= $filename->panvat;
                    if (!empty($fileName)) {
                         if (File::exists('public/files/roster/'.$fileName)) {
                            unlink('public/files/roster/'.$fileName);
                            }
                     }
                    }
                    else
                    {
                        if(!empty($filename->panvat)){
                            $panvat = $filename->panvat;
                            }
                        else{
                            $panvat = '';
                           
                        }
                    }
                $input['expertise_id'] = implode(",", $input['expertise_id']);


                // $input['consultancy_id'] = implode(",", $input['consultancy_id']);

               $event = Roster::where('id',$id)->update([
                       'email' => $input['email'],
                        'p_work' => $input['p_work'],
                        'p_perf' => $input['p_perf'],
                        'expertise_id'=> $input['expertise_id'],
                         'contact'=> $input['contact'],
                        'resume' => $featured,
                        'panvat' => $panvat,
                        'otherdoc' => $otherdoc,
                        'fullname' =>$input['fullname'],              
                ]);
       
      
       
        return redirect('roster')->withFlashSuccess('Roster profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Roster::findOrFail($id);
        $event->delete();
        return redirect('roster')->withFlashSuccess('Roster profile is deleted successfully.');
    }

    public function downloadFile($filename)
    {
         $file_path = public_path() .'/files/roster/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");

    }
}
