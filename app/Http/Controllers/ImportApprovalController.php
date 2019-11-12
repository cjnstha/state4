<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyMgmt;
use App\Models\ApprovalDetail;
use App\Models\ApprovalDocs;
use App\Models\Ministry;
use App\Models\MinistryApprovalDocs;
use App\Models\AssuranceLetter;
use App\User;
use File;
use Auth;
use App\Http\Requests\Backend\ImportApproval\CreateImportApprovalRequest;
use App\Http\Requests\Backend\ImportApproval\EditImportApprovalRequest;
use App\Http\Requests\Backend\ImportApproval\DeleteImportApprovalRequest;

class ImportApprovalController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	$datas = ApprovalDetail::get();
        $user = Auth::user();
    	return view('import_approval_detail.index',compact('datas','user'));
    }

    public function create(CreateImportApprovalRequest $request){
    	$currency        = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
        $ministry        = Ministry::get();
    	return view('import_approval_detail.create',compact('currency','nepali_currency','ministry'));
    }

    public function filterSearch(Request $request)
    {

       $obj = (new ApprovalDetail)->newQuery(); 
       $user = Auth::user();
        
            if ($request->has('name')) {
            $name = $request->get('name');
            $obj->where('organization_name', $name);
        }


        if ($request->has('discount')) {
            $discount = $request->get('discount');
            $obj->where($discount,'on');
        }
       
                        
        $visa = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/importapproval/';
        foreach($visa as $key => $imp){

            $key =$key+1;
           
            //starting of district
            

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td> ' .$imp->organization_name .'</td>
                        <td> ' .$imp->goods_detail_name .'</td>
                        <td>'. '<a href="'. $baseurl .'edit/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <form method="POST" action="'. $baseurl .'delete/'. $imp->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    
                                </form>
                                <a target="_blank" href="'. $baseurl .'preview/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                        </td>
                    </tr>';
        }

            $table_starting = '<table id="datatable" class="table table-striped table-bordered tbl_import">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th> Name</th>
                                            <th>Good Detail Name</th>
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

    public function store(CreateImportApprovalRequest $request){
    	$this->validate($request,[
            'organization_name' => 'required',
            
        ]);
        $data['organization_name']         = $request->organization_name;
        $data['goods_detail_name']         = $request->goods_detail_name;
        $data['bill_currency']             = $request->bill_currency;
        $data['bill_amount']               = $request->bill_amount;
        $data['ministry_id']               = $request->ministry_id;
        $data['new_bill_currency']         = $request->new_bill_currency;
        $data['new_bill_amount']           = $request->new_bill_amount;
        $data['pre_approval_date']         = $request->pre_approval_date;
        $data['custom_exemption']          = $request->custom_exemption;
        $data['vat_exemption']             = $request->vat_exemption;
        $data['import_approval_exemption'] = $request->import_approval_exemption;
        $data['import_approval']           = $request->import_approval;
        $save = ApprovalDetail::create($data);

        if( $request->hasFile('document'))
        {
            $files = $request->file('document');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/import_approval_docs/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);
                    $doc['document'] = $newFileName;
                    $doc['original_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $save->id;
                    ApprovalDocs::create($doc);
                }
            }
            }
        }

        if( $request->hasFile('ministry_approval'))
        {
            $files = $request->file('ministry_approval');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/ministry_approval_docs/';
            if(!empty($newFileName))
                { 
                    $file->move($destinationPath, $newFileName);
                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $save->id;
                    MinistryApprovalDocs::create($doc);
                }
            }
            }
        }

        if( $request->hasFile('assurance_letter'))
        {
            $files = $request->file('assurance_letter');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/assurance_letter/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);
                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $save->id;
                    AssuranceLetter::create($doc);
                }
            }
            }
        }
        return redirect()->route('import.index')->withFlashSuccess('Import Approval Detail is created successfully.');
    }
    public function edit(EditImportApprovalRequest $request, $id){
        $importApproval  = ApprovalDetail::find($id);        
        $user = Auth::user();
        $project_date = $importApproval->created_at;
        $pro_date     = explode(' ', $project_date);
        $today        = date('Y-m-d');
        $prodate      = strtotime($pro_date[0]);
        $today        = strtotime($today);
        $calc         = $today-$prodate;
        $calc         = date('d',$calc);
        $ministry     = Ministry::get();
       if($user->hasRole('Admin'))
       {
         $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
         $currency        = CurrencyMgmt::where('title','!=','NPR')->get();
         return view('import_approval_detail.edit',compact('currency','nepali_currency','importApproval','ministry'));
       }
       else
       {
        if($calc <= '7')
        {
          $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
          $currency        = CurrencyMgmt::where('title','!=','NPR')->get();
          return view('import_approval_detail.edit',compact('currency','nepali_currency','importApproval','ministry'));
        }
        else
        {
            return redirect()->route('import.index')->withFlashSuccess('Import Approval cannot be edited');
        }
       }
    }

    public function update(EditImportApprovalRequest $request, $id)
    {
        $this->validate($request,[
            'organization_name' => 'required',
        ]);


        $importApproval = ApprovalDetail::find($id);
        $importApproval['organization_name']         = $request->organization_name;
        $importApproval['goods_detail_name']         = $request->goods_detail_name;
        $importApproval['bill_currency']             = $request->bill_currency;
        $importApproval['bill_amount']               = $request->bill_amount;
        $importApproval['ministry_id']               = $request->ministry_id;
        $importApproval['new_bill_currency']         = $request->new_bill_currency;
        $importApproval['new_bill_amount']           = $request->new_bill_amount;
        $importApproval['pre_approval_date']         = $request->pre_approval_date;
        $importApproval['custom_exemption']          = $request->custom_exemption;
        $importApproval['vat_exemption']             = $request->vat_exemption;
        $importApproval['import_approval_exemption'] = $request->import_approval_exemption;
        $importApproval['import_approval']           = $request->import_approval;
        $importApproval->save();

         if( $request->hasFile('document'))
        {
            $files = $request->file('document');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/import_approval_docs/';
            if(!empty($newFileName))
                {   

                    $file->move($destinationPath, $newFileName);

                    $doc['document'] = $newFileName;
                    $doc['original_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $id;
                    ApprovalDocs::create($doc);
                }
            }
            }
        }

        if( $request->hasFile('ministry_approval'))
        {
            $files = $request->file('ministry_approval');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/ministry_approval_docs/';
            if(!empty($newFileName))
                { 
                    $file->move($destinationPath, $newFileName);
                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $save->id;
                    MinistryApprovalDocs::create($doc);
                }
            }
            }
        }

        if( $request->hasFile('assurance_letter'))
        {
            $files = $request->file('assurance_letter');           
            if(is_array($files) || is_object($files))
            {
                foreach($files as $file)
            {
            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/assurance_letter/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);
                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;
                    $doc['approval_detail_id'] = $save->id;
                    AssuranceLetter::create($doc);
                }
            }
            }
        }
        return redirect()->route('import.index')->withFlashSuccess('Import Approval Detail is updated successfully.');
    }

    public function singleDeleteApprovalDocs($id)
    {
        $model         = ApprovalDocs::findOrFail($id);
        $parent        = $model->approval_detail_id;
        $document_path = public_path().'/files/import_approval_docs/'.$model->document;
        File::delete($document_path);
        $model->delete();
        return Redirect()->route('import.edit',$parent);
    }

    public function singleDeleteMinistryApprovalDocs($id)
    {
        $model         = MinistryApprovalDocs::findOrFail($id);
        $parent        = $model->approval_detail_id;
        $document_path = public_path().'/files/ministry_approval_docs/'.$model->document;
        File::delete($document_path);
        $model->delete();
        return Redirect()->route('import.edit',$parent);
    }

    public function singleDeleteAssuranceLetter($id)
    {
        $model         = AssuranceLetter::findOrFail($id);
        $parent        = $model->approval_detail_id;
        $document_path = public_path().'/files/assurance_letter/'.$model->document;
        File::delete($document_path);
        $model->delete();
        return Redirect()->route('import.edit',$parent);
    }

    public function delete(DeleteImportApprovalRequest $request,$id)
    {
        ApprovalDetail::destroy($id); 
        AssuranceLetter::where('approval_detail_id','=',$id)->destroy();      
        MinistryApprovalDocs::where('approval_detail_id','=',$id)->destroy();      
        ApprovalDocs::where('approval_detail_id','=',$id)->destroy();      
           return redirect()->route('import.index')->withFlashSuccess('Import Approval Detail is deleted successfully.');
    }

    public function preview(Request $request, $id){
        $currency        = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
        $importApproval  = ApprovalDetail::find($id);
        return view('import_approval_detail.preview',compact('currency','nepali_currency','importApproval'));
    }

   
}
