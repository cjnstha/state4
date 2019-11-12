<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDocument;
use App\Models\MultipleProgressDoc;
use App\Project;
use Illuminate\Support\Facades\Input;
use Redirect;
use Response;



class ProjectDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $services = ProjectDocument::all();

        $project_code = Project::pluck('project_name', 'id');
        $projects = Project::pluck('project_code', 'id');

        $multipledoc = \DB::table('multipleprogress_doc')->where('file_id', '0')->get();

         // dd($multipledoc);
        if(sizeof($multipledoc) > 0 ) {

          
         foreach( $multipledoc as $files ) {
           //dd($files);
              $fileWithPath = public_path().'/files/project_document/'.$files->progress_doc;
               //dd($fileWithPath);
                if(is_file($fileWithPath)){
                  
                  $deleted= \File::delete($fileWithPath);
                 

            }
                $d_deleted=\DB::table('multipleprogress_doc')->where('id', $files->id)->delete();
                    // dd($d_deleted);
           }

         }
     
        return view('projectdocument.index', compact('services','project_code','projects'));
    }

    public function create()
    {
         $data['projects'] = Project::pluck('project_name', 'id');
        return view('projectdocument.create', $data);
    }



        public function filterSearch(Request $request)
    {
        // print_r($request->all());
         // die;
       $obj = (new ProjectDocument)->newQuery();

        if ($request->has('project_id')) {
            $project_id = $request->get('project_id');
            $obj->where('project_id',$project_id);
        }

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
            $obj->where('quarter_year', $quarter_year);
        }
        
        // $projects = $obj->toSql();
        $projects = $obj->get();

        // var_dump($projects);
        // die;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/prodoc/';

        foreach($projects as $key => $project){
            // die;

            $key =$key+1;

             if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }

             // <td>'.  '<a class="link" href="'. url('prodoc/downloadFile/'.$project->contract_doc )  .'"  target="_blank">'.  $project->original_contract_doc .'</a> </td>
        $multipleprogress = ' ';
        
        foreach($project['multiple'] as $s) {
           // var_dump($s->progress_doc);
     
       // die;
             $multipleprogress .= '
            <li><a class="link" href="  '. url('/prodoc/downloadFile/'.$s->progress_doc ) .'" target="_blank">'. $s->original_progress_doc .'</a>
            </li> ';
             
        }

        $html .= '<tr>
                    <td>'. $key .'</td>
                    <td>'.   $project->projectlist->project_name  .'</td>
                    <td>'.   $project->contact_person  .'</td>
                 
                   <td> <a class="link" href="'. url('prodoc/downloadFile/'.$project->proposal_doc )  .'"  target="_blank">'.  $project->original_proposal_doc .'</a> </td>
                   <td> <a class="link" href="'. url('prodoc/downloadFile/'.$project->contract_doc )  .'"  target="_blank">'.  $project->original_contract_doc .'</a> </td>

                   <td> <ul> '. $multipleprogress .'</ul> </td>

                    <td>'.  $quarter_n_year .'</td>
                    <td> <a class="link-anchor" href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
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
                                            <th>Project Name</th>
                                            <th>Contact Person</th>
                                            <th>Proposal Document</th>
                                            <th>Contract Document</th>
                                            <th>Progress Document</th>
                                            <th>Quarter & Year</th>
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


public function tempProgress(Request $request)
{
    // dd('readh hrr');
    $tmp_file = [];
  foreach( $request['tmp_file'] as $key=>$input )
   {

     if($request->hasFile('tmp_file'))
            {
                        $file = $request->file('tmp_file');
                        $extension = $file[$key]->getClientOriginalExtension();
                        
                        $feat  = $file[$key]->getClientOriginalName();
                        $name_only = explode(".".$extension, $feat);
                        $name_only= $name_only[0];
                        $featured= str_replace(' ', '-', $name_only); 
                        $featured= str_replace('.', '-', $featured);
                         //var_dump($featured);exit;

                        $newFileName =  $featured.rand(). '.' . $extension;
                        $destinationPath = public_path(). '/files/project_document/';
                        if(!empty($newFileName))
                            {   
                                $file[$key]->move($destinationPath, $newFileName);

                                $progress_doc[] = $newFileName;
                            }
            
                 $tmp_saved =  MultipleProgressDoc::create([
                        'progress_doc' => $newFileName,
                        'original_progress_doc'=> $featured.'.'.$extension,
                ]);

        $photo_object = new \stdClass();
        $photo_object->name = $featured.'.'.$extension;
        $photo_object->fileID = $tmp_saved->id;
        $tmp_file[] = $photo_object;
        }
    }

    return response()->json(array('files' => $tmp_file), 200);

}



    public function store(Request $request)
     {
      // dd($request->all());
        // $this->validate($request,[
        //     'project_id'        => 'required',
        //     'log_frame'         => 'required',
        //     'keywords'          => 'required',
        //     'contact_person'    => 'required',
        //     'proposal_doc'      => 'required|mimes:doc,pdf,docx', 
        //     'contract_doc'      => 'required|mimes:doc,pdf,docx',
        //     'budget_doc'        => 'required|mimes:xlsx,xlx,xls',
        //     // 'progress_doc.*'    => 'required|mimes:doc,pdf,docx',  
        // ]);


        ProjectDocument::createModel($request);

        return redirect()->route('prodoc.index')->withFlashSuccess('Project Document has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        // dd('here');
        $data['pro']= ProjectDocument::findOrFail($id);
        $data['progress_files'] = $data['pro']->multiple;
        $data['projects'] = Project::pluck('project_name', 'id');
        // dd($data);
        return view('projectdocument.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        // dd($request->all());
       // $this->validate($request,[
       //      'project_id'        => 'required',
       //      'log_frame'         => 'required',
       //      'keywords'          => 'required',
       //      'contact_person'    => 'required',
       //      'proposal_doc'      => 'mimes:doc,pdf,docx', 
       //      'contract_doc'      => 'mimes:doc,pdf,docx',
       //      'budget_doc'        => 'mimes:xlsx,xlx,xls',
       //      // 'progress_doc.*'    => 'mimes:doc,pdf,docx',    
       //  ]);

        ProjectDocument::updateModel($request, $id);
        // dd($request);
        return redirect()->route('prodoc.index')->withFlashSuccess('Information updated successfully.');
    }

    public function destroy($id)
    {
        // dd('destriy');
        $model = ProjectDocument::findOrFail($id);

        ProjectDocument::deleteModel($model);

        $model->delete();
        return redirect()->route('prodoc.index')->withFlashSuccess('Information Deleted successfully.');
    }

     public function singleDestroy($id){
            //DB::table('sliders')->where('id', '=', $id)->delete();

        // dd(Input::all());
        $model = MultipleProgressDoc::findOrFail($id);
        $parent_id = $model->file_id;
        // dd($model, $parent_id);
       $proposal_doc_path = public_path().'/files/project_document/'.$model->progress_doc;
       
        \File::delete($proposal_doc_path);
         $model->delete();

         return Redirect()->route('prodoc.edit', $parent_id);
        }

    public function downloadFile($filename)
    {
        // $pageheader= 'file download';

          $file_path = public_path() .'/files/project_document/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");


    }

}
