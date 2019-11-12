<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MnE;
use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;
// use Redirect;

class MnEController extends Controller
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
        $posts= MnE::all();
        $project_code    = Project::pluck('project_code', 'id');
        $current_year   = date('Y');
                
        return view('mne.index', compact('posts','project_code','current_year'));
        
    }

        public function filterSearch(Request $request)
    {
        // print_r($request->all());
         // die;
       $obj = (new MnE)->newQuery();

        if ($request->has('project_id')) {
            $project_id = $request->get('project_id');
            $obj->where('project_id',$project_id);
        }


        if ($request->has('mne_type')) {
            $mne_type = $request->get('mne_type');
            $obj->where('mne_type', $mne_type);
        }
        
        // $projectsql = $obj->toSql();
        $projects = $obj->get();

        // var_dump($projectsql);
        // var_dump($projects);
        // die;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/mne/';

        $project_code_list       = Project::pluck('project_code', 'id');
        
            // var_dump($project_code_list);
        foreach($projects as $key => $project){
            // die;

            $key =$key+1;
           

        foreach($project_code_list as $id=>$pro_c){
                if($id == $project->project_id) { 
                    $projectcode = $pro_c;
                }
         }

        $date = $project->p_date;
        $p_date = strtotime($date);
            
        $udate = $project->u_date;
        $u_date = strtotime($udate);
           

        $html .= '<tr>
                    <td>'. $key .'</td>
                    <td>'.   $project->mne_type  .'</td>
                    <td>'.   $projectcode  .'</td>
                  <td>'.   $project->obj  .'</td>
                    <td>'.  date(' F jS, Y',$p_date)  .'</td>
                    <td>'.  date(' F jS, Y',$u_date)  .'</td>
                    <td>'.  '<a class="link" href="'. url('mne/downloadFile/'.$project->document )  .'"  target="_blank">'.  $project->original_document .'</a> </td>
                    <td>'.  $project->keywords .'</td>
                    <td>'. '<a class="link"href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <form method="POST" action="'. $baseurl . $project->id.'">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                <a href="javascript:void(0);" class="action-btns submit">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </form>
                    </td>
                </tr>';

        }

// var_dump($html);

            $table_starting = '<table class="table table-striped table-bordered tbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Project <br>Code</th>
                                            <th>Objective</th>
                                            <th>Prepared datse</th>
                                            <th>Uploaded date</th> 
                                            <th>Document</th>  
                                            <th>Keywords</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
            $table_end = '</tbody><table>';

          

        $data['html'] = $table_starting. $html. $table_end;
       
        $count = strlen($data['html']);

        if($count<5){
                
                $data['html']  = $table_starting. '<tr> <td colspan="9"> No Data Available</td><tr>'. $table_end; 
              }
        
        return $data;
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['project_code']    = Project::pluck('project_code', 'id');
        return view('mne/create', $data);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'mne_type'      => 'required',
            'project_id'    => 'required',
            'obj'           => 'required',
            'p_date'        => 'required',
            'u_date'        => 'required',
            'document'      => 'required',
            //'keywords'      => 'required',
                       
        ]);
        $inputs = $request->all();
       // dd($inputs);

          if($request->hasFile('document'))
        {
            $file = $request->file('document');
            $extension = $request->file('document')->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/mne/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $inputs['document'] = $newFileName;
                    $inputs['original_document'] = $featured.'.'.$extension;
                }
        }
        else{
                 $inputs['document'] = '';
                 $inputs['original_document']= '';
            }

           // dd($inputs);
        MnE::create($inputs);

       return redirect()->route('mne.index')->withFlashSuccess('MnE profile has been added successfully.');
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
        $posts = MnE::findOrFail($id);
        $project_code = Project::pluck('project_code','id');
        return view('mne/edit', compact('posts','project_code'));
        
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
            'mne_type' => 'required',
            'project_id'    => 'required',
            'obj' => 'required',
            'p_date' => 'required',
            'u_date' => 'required',
            // 'keywords' => 'required',
                                   
        ]);

        $inputs = $request->all();
        $mne = MnE::findOrFail($id);
        $mne->fill($inputs);


      
        if($request->hasFile('document'))
        {
            $model =  MnE::findOrFail($id);

            $filePath = public_path().'/files/mne/'.$model->document;
             
            \File::delete($filePath);

            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
            

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/mne/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);
                     //dd($mne->document);
                    $mne->document = $newFileName;
                    $mne->original_document = $featured.'.'.$extension;
                }
        }

        $mne->save();
       
         return redirect()->route('mne.edit', $id)->withFlashSuccess('MnE profile is updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = MnE::findOrFail($id);
        $event->delete();
        return redirect('mne')->withFlashSuccess('MnE profile is deleted successfully.');
    }

     public function downloadFile($filename)
    {
         $file_path = public_path() .'/files/mne/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");


    }
}
