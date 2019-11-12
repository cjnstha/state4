<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Models\Staff;
use App\Models\Caste;

use Response;
use Redirect;

class StaffController extends Controller
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
        $staffs= Staff::all();
        $caste = Caste::pluck('name', 'id');
        $projects = Project::pluck('project_name', 'id');

        return view('staff.index', compact('staffs', 'caste','projects'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (new Staff)->newQuery();

        if ($request->has('gender')) {
            $gender = $request->get('gender');
            $obj->where('gender',$gender);
        }

        if ($request->has('designation')) {
            $designation = $request->get('designation');
            $obj->where('designation','LIKE', '%'.$designation.'%');
        }

        if ($request->has('base')) {
            $base = $request->get('base');
            $obj->where('base',$base);
        }

        if ($request->has('caste_id')) {
            $caste_id = $request->get('caste_id');
            $obj->where('caste_id',$caste_id);
        }

        if ($request->has('project_id')) {
            $project_id = $request->get('project_id');
            $obj->where('project_id',$project_id);
        }

        $lists = $obj->get();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/staffs/';
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name .'</td>
                        <td>'. $list->address .'</td>
                        <td>'. $list->contact_no .'</td>
                        <td>'. $list->email .'</td>
                        <td>'. date(' F jS, Y',strtotime($list->joined_date)) .'</td>
                        <td>'. $list->designation .'</td>
                        <td>'. (isset($list->project) ? $list->project->project_name : '' ) .'</td>
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
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Email</th>
                                            <th>Joined Date</th>
                                            <th>Designation</th>
                                            <th>Assigned Project</th>
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
        $projects = Project::pluck('project_name', 'id');
         $caste = Caste::pluck('name', 'id');
        return view('staff.create', compact('projects','caste'));
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
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'joined_date' => 'required',
            'designation' => 'required',
            'project_id' => 'required',
            'gender' => 'required',
            'base' => 'required',
            'caste_id' => 'required',
            'designation_level' => 'required',
            'member_type' => 'required',
            'staff_photo'      => 'required|mimes:jpeg,jpg,png', 
        ]);

        $inputs = $request->all();
       // dd($inputs);

          if($request->hasFile('staff_photo'))
        {
            $file = $request->file('staff_photo');
            $extension = $request->file('staff_photo')->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/staff/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $inputs['staff_photo'] = $newFileName;
                    $inputs['original_staff_photo'] = $featured.'.'.$extension;
                }
        }
        else{
                 $inputs['staff_photo'] = '';
                 $inputs['original_staff_photo']= '';
            }

           // dd($inputs);
        Staff::create($inputs);
        return redirect()->route('staffs.index')->withFlashSuccess('Staff has been added successfully.');
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
        $staff = Staff::findOrFail($id);
        $projects = Project::pluck('project_name', 'id');
           $caste = Caste::pluck('name', 'id');
        return view('staff.edit', compact('projects', 'staff','caste'));
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
            'name'              => 'required',
            'address'           => 'required',
            'contact_no'        => 'required',
            'email'             => 'required|email',
            'joined_date'       => 'required',
            'designation'       => 'required',
            'project_id'        => 'required',
            'gender'            => 'required',
            'base'              => 'required',
            'caste_id'          => 'required',
            'designation_level' => 'required',
            'member_type'       => 'required',
            'staff_photo'       => 'mimes:jpeg,jpg,png',
        ]);

         $inputs = $request->all();
        $staff = Staff::findOrFail($id);
        $staff->fill($inputs);


      
        if($request->hasFile('staff_photo'))
        {
            $model =  Staff::findOrFail($id);

            $filePath = public_path().'/files/staff/'.$model->staff_photo;
             
            \File::delete($filePath);

            $file = $request->file('staff_photo');
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only); 
            $featured= str_replace('.', '-', $featured);
            

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/staff/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $staff->staff_photo = $newFileName;
                    $staff->original_staff_photo = $featured.'.'.$extension;
                }
        }

        $staff->save();
        // $staff->update($request->all());
        return redirect()->route('staffs.edit', $id)->withFlashSuccess('Staff profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::destroy($id);
        return redirect()->route('staffs.index')->withFlashSuccess('Staff profile is deleted successfully.');
    }

     public function downloadFile($filename)
    {
         $file_path = public_path() .'/files/staff/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");
    }

    
}
