<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NGO;
use App\Http\Requests\Backend\Ngo\CreateNgoRequest;
use App\Http\Requests\Backend\Ngo\EditNgoRequest;
use App\Http\Requests\Backend\Ngo\DeleteNgoRequest;
use Auth;

class NGOController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ngos= NGO::all();
        return view('ngo.index', compact('ngos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ngo.create');
    }

    public function filterSearch(CreateNgoRequest $request)
    {
        $obj = (new NGO)->newQuery();

        // if ($request->has('name')) {
        //     $name = $request->get('name');
        //     $obj->where('name', 'LIKE', '%'.$name.'%');
        // }

        if ($request->has('name')) {
            $name = $request->get('name');
        }else{
            $name = '';
        }
            $obj->where('name', 'LIKE', '%'.$name.'%');

        $lists = $obj->get();
        // return $lists;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/ngo/';
        
        foreach($lists as $key => $list){

            $key =$key+1;

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name .'</td>
                        <td>'. $list->address .'</td>
                        <td>'. $list->contact_no .'</td>
                        <td>'. $list->email .'</td>
                        <td>'. date(' F jS, Y',strtotime($list->established_date)) .'</td>
                        <td>'. $list->primary_project .'</td>
                        <td>'. $list->funded_by .'</td>
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
                                            <th>Established At</th>
                                            <th>Primary Project</th>
                                            <th>Funded By</th>
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
              // die;
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNgoRequest $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'established_date' => 'required',
            'primary_project' => 'required',
            'funded_by' => 'required',
        ]);
        NGO::create($request->all());
        return redirect()->route('ngo.index')->withFlashSuccess('NGO Profile has been added successfully.');
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
    public function edit(EditNgoRequest $request, $id)
    {
        $ngo = NGO::findOrFail($id);
        return view('ngo.edit', compact('ngo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNgoRequest $request, $id)
    {
        $ngo = NGO::findOrFail($id);

        $loginUser = Auth::user();
        if ((!$loginUser->hasRole('Admin')) && $ngo->user_id != $loginUser->id) {
            return redirect()->back()->withFlashDanger('You don\'t have access to edit this.');
        }
        
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'established_date' => 'required',
            'primary_project' => 'required',
            'funded_by' => 'required',
        ]);
        $ngo->update($request->all());
        return redirect()->route('ngo.edit', $id)->withFlashSuccess('NGO profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteNgoRequest $request, $id)
    {
        $ngo = NGO::findOrFail($id);

        $loginUser = Auth::user();
        if ((!$loginUser->hasRole('Admin')) && $ngo->user_id != $loginUser->id) {
            return redirect()->back()->withFlashDanger('You don\'t have access to delete this.');
        }

        NGO::destroy($id);
        return redirect()->route('ngo.index')->withFlashSuccess('NGO profile is deleted successfully.');
    }
}
