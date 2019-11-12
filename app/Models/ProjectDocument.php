<?php

namespace App\Models;
use App\Models\MultipleProgressDoc;

use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    protected $table = 'project_documents';

    protected $guarded = ['_method','_token','progress_doc','progress_doc_id'];

    public function projectlist(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    

    public function multiple()
    {
        return $this->hasMany('App\Models\MultipleProgressDoc','file_id');
    }

    public static function createModel($request) 
    {
        $inputs = $request->all();


        if($request->hasFile('proposal_doc'))
        {
            $file = $request->file('proposal_doc');
            $extension = $request->file('proposal_doc')->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $proposal_doc = $newFileName;
                    $original_proposal_doc= $featured.'.'.$extension;
                }
        }
        else{
                 $proposal_doc = '';
                 $original_proposal_doc= '';
            }

        if($request->hasFile('contract_doc'))
        {
            $file = $request->file('contract_doc');
            $extension = $request->file('contract_doc')->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $contract_doc = $newFileName;
                     $original_contract_doc = $featured.'.'.$extension;
                }
        }
        else{
                 $contract_doc = '';
                 $original_contract_doc= '';
            }

        if($request->hasFile('budget_doc'))
        {
            $file = $request->file('budget_doc');
            $extension = $request->file('budget_doc')->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $budget_doc = $newFileName;
                     $original_budget_doc = $featured.'.'.$extension;
                }
        }
        else{
                 $budget_doc = '';
                 $original_budget_doc= '';
            }

        
        // if(isset($inputs['progress_doc']))
        // {
        //  foreach( $request['progress_doc'] as $key=>$input )
        //         {
             
        //          if($request->hasFile('progress_doc'))
        //             {
        //                 $file = $request->file('progress_doc');
        //                 $extension = $file[$key]->getClientOriginalExtension();
        //                 $feat  = $file[$key]->getClientOriginalName();
        //                 $name_only = explode(".".$extension, $feat);
        //                 $name_only= $name_only[0];
        //                 $featured= str_replace(' ', '-', $name_only); 
        //                 $featured= str_replace('.', '-', $featured);
                         

        //                 $newFileName =  $featured.rand(). '.' . $extension;
        //                 $destinationPath = public_path(). '/files/project_document/';
        //                 if(!empty($newFileName))
        //                     {   
        //                         $file[$key]->move($destinationPath, $newFileName);

        //                         $progress_doc[] = $newFileName;
        //                         $original_progress_doc[] = $featured.'.'.$extension;
        //                     }
        //             }
        //         else{
        //                  $progress_doc[] = '';
        //                  $original_progress_doc[] ='';
        //             }

        //         }
        // }
        // if(isset($inputs['progress_doc'])){
        //     $inputs['progress_doc'] = implode(",", $progress_doc);
        // }
        //var_dump($progress_doc);exit;
        $inputs['proposal_doc'] = $proposal_doc;
        $inputs['original_proposal_doc'] = $original_proposal_doc;
        $inputs['contract_doc'] = $contract_doc;
        $inputs['original_contract_doc'] = $original_contract_doc;
        $inputs['budget_doc'] = $budget_doc;
        $inputs['original_budget_doc'] = $original_budget_doc;

         

        $obj = ProjectDocument::create($inputs);

         for( $i=0; $i<count($request->progress_doc_id); $i++ )
                {
                MultipleProgressDoc::whereIn('id', explode(",", $request->progress_doc_id))
                        ->update(['file_id' => $obj->id]);
                }
    }

    public static function updateModel($request, $id) 
    {
        $inputs = $request->all();
        // dd($inputs);

        $service = ProjectDocument::findOrFail($id);
        $service->fill($inputs);
      
               if($request->hasFile('proposal_doc'))
        {
            $model =  ProjectDocument::findOrFail($id);

            $filePath = public_path().'/files/project_document/'.$model->proposal_doc;
             
            \File::delete($filePath);

            $file = $request->file('proposal_doc');
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
            

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $service->proposal_doc = $newFileName;
                    $service->original_proposal_doc = $featured.'.'.$extension;
                }
        }

      
       

        if($request->hasFile('contract_doc'))
        {
                 $model =  ProjectDocument::findOrFail($id);
            $filePath = public_path().'/files/project_document/'.$model->contract_doc;
            \File::delete($filePath);

            $file = $request->file('contract_doc');
            $extension = $file->getClientOriginalExtension();
            
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $service->contract_doc = $newFileName;
                    $service->original_contract_doc = $featured.'.'.$extension;
                }
        }

              if($request->hasFile('budget_doc'))
        {
                 $model =  ProjectDocument::findOrFail($id);
            $filePath = public_path().'/files/project_document/'.$model->budget_doc;
            \File::delete($filePath);

            $file = $request->file('budget_doc');
            $extension = $file->getClientOriginalExtension();
            
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $service->budget_doc = $newFileName;
                    $service->original_budget_doc = $featured.'.'.$extension;
                }
        }


        $service->save();

        MultipleProgressDoc::whereIn('id', explode(",", $request->progress_doc_id))
        ->update(['file_id' => $service->id]);

        //  if(isset($inputs['progress_doc']))
        // {
        //  foreach( $request['progress_doc'] as $key=>$input )
        //         {
             
        //          if($request->hasFile('progress_doc'))
        //             {
        //                 $file = $request->file('progress_doc');
        //                 $extension = $file[$key]->getClientOriginalExtension();
                        
        //                 $feat  = $file[$key]->getClientOriginalName();
        //                 $name_only = explode(".".$extension, $feat);
        //                 $name_only= $name_only[0];
        //                 $featured= str_replace(' ', '-', $name_only); 
        //                 $featured= str_replace('.', '-', $featured);
        //                  //var_dump($featured);exit;

        //                 $newFileName =  $featured.rand(). '.' . $extension;
        //                 $destinationPath = public_path(). '/files/project_document/';
        //                 if(!empty($newFileName))
        //                     {   
        //                         $file[$key]->move($destinationPath, $newFileName);

        //                         $progress_doc[] = $newFileName;
        //                     }
        //             }
        //         else{
        //                  $progress_doc[] = '';
        //             }

        //         }
        


        //  foreach( $progress_doc as $key=>$fileName )
        //         {
        //        // dd($key, $fileName);
        //             // dd($image_id);
        //          MultipleProgressDoc::create([
        //                 'file_id' => $id,
        //                 'progress_doc' => $fileName,
        //                 'original_progress_doc'=> $featured.'.'.$extension,
        //         ]);
        //         }     
        // }  
    }

  public static function deleteModel($model) 
    {
        $proposal_doc = public_path().'/files/project_document/'.$model->proposal_doc;
        $contract_doc = public_path().'/files/project_document/'.$model->contract_doc;

      
        \File::delete($proposal_doc, $contract_doc);

        $progress_id = $model->id;

        $newmodel = MultipleProgressDoc::where('file_id',$progress_id)->get();

        foreach( $newmodel as $key=>$files )
        {
            $fileWithPath = public_path().'/files/project_document/'.$files->progress_doc;
            \File::delete($fileWithPath);
            $files->delete();
        }
    
    }



}
