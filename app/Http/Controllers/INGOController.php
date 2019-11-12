<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\INGO;
use Auth;
use DB;
use App\Http\Requests\Backend\Ingo\CreateIngoRequest;
use App\Http\Requests\Backend\Ingo\DeleteIngoRequest;
use App\Http\Requests\Backend\Ingo\EditIngoRequest;

class INGOController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$ingos = INGO::all();      
        $country_json = file_get_contents('json/country.json');
        $countries    = json_decode($country_json);
        $role_user = DB::table('user_has_roles')->where('user_id','=',Auth::user()->id)->first();
        $role = DB::table('roles')->where('id','=',$role_user->role_id)->first();
    	return view('ingo.index',compact('ingos','countries','role'));
    }

    public function create()
    { 
    	$user_id      = Auth::user()->id;   	
    	$country_json = file_get_contents('json/country.json');
    	$countries    = json_decode($country_json);
    	return view('ingo.create',compact('countries','user_id'));
    }

    public function filterSearch(Request $request)
    {

       $obj = (new INGO)->newQuery(); 
        
        if ($request->has('country')) {
            $country = $request->get('country');
            $obj->where('country','=',$country);
        }

        if ($request->has('name')) {
            $name = $request->get('name');
            $obj->where('name','=',$name);
        }
        
        $importApproval = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/ingo/';
        foreach($importApproval as $key => $imp){

            $key =$key+1;
           
            //starting of district
            

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $imp->name.'</td>
                        <td>'. $imp->address.'</td>
                        <td> ' .$imp->country .'</td>
                        <td> ' .$imp->contact_no .'</td>
                        <td> ' .$imp->email .'</td>
                        <td>'. '<a href="'. $baseurl .'edit/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl .'delete/'. $imp->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a href="'. $baseurl .'preview/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                </form>
                        </td>
                    </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered tbl_ingo">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
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

    public function store(CreateIngoRequest $request)
    {
    	$this->validate($request,[
            'name'       => 'required|unique:ingo',
            'email'      => 'required|email',
            'contact_no' => 'required',            
        ]);

        INGO::create($request->all());
        return redirect()->route('ingo.index')->withFlashSuccess('INGO Profile has been added successfully.');
    }

    public function edit($id)
    {
    	$ingo         = INGO::find($id);
        $user         = Auth::user();
        $project_date = $ingo->created_at;
        $pro_date     = explode(' ', $project_date);
        $today        = date('Y-m-d');
        $prodate      = strtotime($pro_date[0]);
        $today        = strtotime($today);
        $calc         = $today-$prodate;
        $calc         = date('d',$calc);
        if($user->hasRole('Admin'))
        {            
          $country_json = file_get_contents('json/country.json');
          $countries    = json_decode($country_json);
          return view('ingo.edit',compact('ingo','countries'));
        }
        else
        {
            if($calc <= '07')
            {
               $country_json = file_get_contents('json/country.json');
               $countries    = json_decode($country_json);
               return view('ingo.edit',compact('ingo','countries')); 
            }
            else
            {
                return redirect()->route('ingo.index')->withFlashSuccess('INGO profile cannot be edited');
            }
        }
    }

    public function update(EditIngoRequest $request,$id)
    {
    	$ingo = INGO::find($id);

    	$ingos = $request->all();

    	$ingo->user_id        = Auth::user()->id;
    	$ingo->name           = $ingos['name'];
    	$ingo->country        = $ingos['country'];
    	$ingo->address        = $ingos['address'];
    	$ingo->contact_no     = $ingos['contact_no'];
    	$ingo->contact_person = $ingos['contact_person'];
    	$ingo->email          = $ingos['email'];
    	$ingo->staff_number   = $ingos['staff_number'];
        $ingo->estd_date      = $ingos['estd_date'];
    	$ingo->close_date     = $ingos['close_date'];
    	$ingo->save();

    	return redirect()->route('ingo.index')->withFlashSuccess('INGO Profile has been updated successfully.');
    }

    public function destroy(DeleteIngoRequest $request,$id)
    {
    	$ingo = INGO::find($id);
    	$ingo->delete();
    	 return redirect()->route('ingo.index')->withFlashSuccess('INGO Profile has been deleted successfully.');
    }
}
