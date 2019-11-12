<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Response;
// use Redirect;

class ResearchController extends Controller
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
        $posts= Research::all();
        $project_codes  = Project::pluck('project_code','id');
                
        return view('research.index', compact('posts','project_codes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['project_code']    = Project::pluck('project_code', 'id');
        return view('research/create', $data);
       
    }

    public function filterSearch(Request $request)
    {
       $obj = (new Research)->newQuery();

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('re_type')) {
            $re_type = $request->get('re_type');
            $obj->where('re_type',$re_type);
        }

        if ($request->has('publish_date')) {
            $publish_date = $request->get('publish_date');
            $obj->where('publish_date',$publish_date);
        }

        $lists = $obj->get();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/plan/';
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->re_type .'</td>
                        <td>'. $list->obj .'</td>
                        <td>'. $list->location .'</td>
                        <td>'. $list->publish_date .'</td>
                        <td>'. '<a href="'. $baseurl . $list->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $list->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </form>
                        </td>
                    </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Objective</th>
                                            <th>Location</th> 
                                            <th>Publish date</th>                   
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'research_name'     => 'required',
            'project_id'        => 'required',
            're_type'           => 'required',
            'document'          => 'required|mimes:doc,pdf,docx',
            'obj'               => 'required',
            'location'          => 'required',
            'publish_date'      => 'required',
            'target_aud'        => 'required',
            'sh_intro'          => 'required',
            'm_findings'        => 'required',
            'recom'             => 'required',
            'c_type'            => 'required',
            'c_date'            => 'required',

        ]);
            $req =$request->all();

            $req['m_findings']= implode(",",$req['m_findings']);
            $req['recom']= implode(",",$req['recom']);

            $req['c_type']= implode(",",$req['c_type']);
            $req['c_date']= implode(",",$req['c_date']);

            

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
            $destinationPath = public_path(). '/files/research/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $req['document'] = $newFileName;
                    $req['original_document'] = $featured.'.'.$extension;
                }
        }
        else{
                 $req['document'] = '';
                 $req['original_document']= '';
            }

            Research::create($req);
         
       return redirect()->route('research.index')->withFlashSuccess('Research profile has been added successfully.');
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
       
        $pageheader ="Edit Research";
        $posts = Research::findOrFail($id);
       
       
        $m_f= Research::select('m_findings')->where('id',$id)->get();
        $m_findings= explode(',',$m_f[0]->m_findings);

        $re= Research::select('recom')->where('id',$id)->get();
        $recom= explode(',',$re[0]->recom);

        $c_t= Research::select('c_type')->where('id',$id)->get();
        $c_type= explode(',',$c_t[0]->c_type);
        $c_type_count= count($c_type);
        
        $c_d= Research::select('c_date')->where('id',$id)->get();
        $c_date= explode(',',$c_d[0]->c_date);

        $project_code = Project::pluck('project_code','id');
        //$r_persons= explode(',',$r_p[0]->r_persons);
        return view('research/edit', compact('posts', 'pageheader','m_findings','recom','c_type','c_date','c_type_count','project_code'));
        
        
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
            'research_name'     => 'required',
            'project_id'        => 'required',
            're_type'           => 'required',
            'document'          => 'mimes:doc,pdf,docx',
            'obj'               => 'required',
            'location'          => 'required',
            'publish_date'      => 'required',
            'target_aud'        => 'required',
            'sh_intro'          => 'required',
            'm_findings'        => 'required',
            'recom'             => 'required',
            'c_type'            => 'required',
            'c_date'            => 'required',
            
        ]);
            $req =$request->all();

            $research_obj = Research::findOrFail($id);
            // $research_obj->update($req);
            $req['m_findings']= implode(",",$req['m_findings']);
            $req['recom']= implode(",",$req['recom']);

            $req['c_type']= implode(",",$req['c_type']);
            $req['c_date']= implode(",",$req['c_date']);
        

          $research_obj->fill($req);
      
        if($request->hasFile('document'))
        {
            $model =  Research::findOrFail($id);

            $filePath = public_path().'/files/research/'.$model->document;
             
            \File::delete($filePath);

            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
            

            $newFileName =  $featured.rand(). '.' . $extension;
            // dd($newFileName);
            $destinationPath = public_path(). '/files/research/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $research_obj->document = $newFileName;
                    // dd($research_obj->document);
                    $research_obj->original_document = $featured.'.'.$extension;
                }
        }

        //dd($req);
          

//dd($research_obj);

        $research_obj->save();




       
         return redirect()->route('research.edit', $id)->withFlashSuccess('Research profile is updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Research::findOrFail($id);
        $event->delete();
        return redirect('research')->withFlashSuccess('Research profile is deleted successfully.');
    }

    public function downloadFile($filename)
    {
         $file_path = public_path() .'/files/research/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");


    }
}
