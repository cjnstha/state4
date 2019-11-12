<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultancy extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consultancy_service';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['_method','_token','project_if','department_if'];

    public static function createModel($request) 
    {
        $inputs = $request->all();
        
        
        if($request->hasFile('contract_document'))
        {
            $contract = $request->file('contract_document');
            $destinationPath = public_path(). '/files/consultancy_service/';
            if(!empty($contract)){                  
                $contract_document = $contract->getClientOriginalName();
                $contract->move($destinationPath, $contract_document);
                }
        }
        else{
                $contract_document = '';
        }
        if($request->hasFile('tor_document'))
        {
            $tor_doc = $request->file('tor_document');
            $destinationPath = public_path(). '/files/consultancy_service/';
             if(!empty($tor_doc)){
                $tor_document = $tor_doc->getClientOriginalName();
                $tor_doc->move($destinationPath, $tor_document);
               }
        }
        else{
                $tor_document = '';
        }

        $inputs['contract_document']    = $contract_document;
        $inputs['tor_document']         = $tor_document;

          $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);
        // dd($inputs);
        Consultancy::create($inputs);

    }

    public static function updateModel($request, $id) 
    {
        $inputs = $request->all();
        $service = Consultancy::findOrFail($id);
        
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);

        $service->fill($inputs);

        if($request->hasFile('contract_document'))
        {
            $contract = $request->file('contract_document');
            $destinationPath = public_path(). '/files/consultancy_service/';
            if(!empty($contract)){                  
                $contract_document = $contract->getClientOriginalName();
                $contract->move($destinationPath, $contract_document);
                $service->contract_document = $contract_document;
                }
        }
        if($request->hasFile('tor_document'))
        {
            $tor_doc = $request->file('tor_document');
            $destinationPath = public_path(). '/files/consultancy_service/';
             if(!empty($tor_doc)){
                $tor_document = $tor_doc->getClientOriginalName();
                $tor_doc->move($destinationPath, $tor_document);
               $service->tor_document = $tor_document;
               }
        }

       
       
        if(isset($inputs['department_if']))
        {
            $service->project_id = NULL;
        }
         if(isset($inputs['project_if']))
        {
            $service->department_name = NULL;
        }
        $service->save();
       
    }

}
