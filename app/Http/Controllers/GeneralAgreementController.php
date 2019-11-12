<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\INGO;
use App\Models\ThemeLess;
use App\Models\GeneralAgreement;
use App\Models\CountryDirector;
use App\Models\GeneralTheme;
use App\Models\GeneralRenew;
use App\Models\CurrencyMgmt;
use App\Http\Requests\Backend\GeneralAgreement\CreateGeneralAgreementRequest;
use App\Http\Requests\Backend\GeneralAgreement\DeleteGeneralAgreementRequest;
use App\Http\Requests\Backend\GeneralAgreement\EditGeneralAgreementRequest;

class GeneralAgreementController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('Admin'))
        {
            $generalagreements = GeneralAgreement::all();
        }
        else
        {
            $generalagreements = GeneralAgreement::where('user_id','=',$user->id)->get();
        }
        $ingos             = INGO::all();
        $themes            = ThemeLess::get();
        $role_user = DB::table('user_has_roles')->where('user_id','=',Auth::user()->id)->first();
        $role = DB::table('roles')->where('id','=',$role_user->role_id)->first();
        return view('general_agreement.index',compact('generalagreements','ingos','themes','role'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $ingos   = INGO::all();
        $thematic_area = ThemeLess::pluck('name','id');
        $month_json       = file_get_contents('json/month.json');
        $months           = json_decode($month_json);
        $currency        = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
        return view('general_agreement.create',compact('user_id','ingos','thematic_area','months','currency','nepali_currency'));
    }

    public function filterSearch(Request $request)
    {

       $obj = (GeneralAgreement::join('general_agreement_theme','general_agreement.id','=','general_agreement_theme.general_agreement_id')); 
       $user = Auth::user();
        
        if($user->hasRole('Admin'))
        {
            if (!empty($request->get('ingo'))) {
            $ingo = $request->get('ingo');
            $obj->where('general_agreement.ingo_id','=',$ingo);
        }

        if (!empty($request->get('ga_code'))) {
            $ga_code = $request->get('ga_code');
            $obj->where('general_agreement.ga_code','=',$ga_code);
        }

        if (!empty($request->has('theme'))) {
            $theme = $request->get('theme');
            $obj->where('general_agreement_theme.theme_id','=',$theme);
        }
        }
        else
        {
            if (!empty($request->get('ingo'))) {
            $ingo = $request->get('ingo');
            $obj->where([['general_agreement.ingo_id','=',$ingo],['general_agreement.user_id','=',$user->id]]);
        }

        if (!empty($request->get('ga_code'))) {
            $ga_code = $request->get('ga_code');
            $obj->where([['general_agreement.ga_code','=',$ga_code],['general_agreement.user_id','=',$user->id]]);
        }

        if (!empty($request->has('theme'))) {
            $theme = $request->get('theme');
            $obj->where([['general_agreement_theme.theme_id','=',$theme],['general_agreement.user_id','=',$user->id]]);
        }
        }
        
        $importApproval = $obj->distinct()->select('general_agreement.id','general_agreement.ingo_id','general_agreement.ga_code','general_agreement.sw_recco_date')->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/generalagreements/';
        foreach($importApproval as $key => $imp){

            $key =$key+1;
            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $imp->ingo->name.'</td>
                        <td>'. $imp->ga_code.'</td>
                        <td> ' .$imp->sw_recco_date.'</td>
                        <td>'. '<a href="'. $baseurl . $imp->id.'/edit" class="action-btns"> 
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

            $table_starting = '<table id="datatable" class="table table-striped table-bordered tbl_generalagreements">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>INGO Name</th>
                                        <th>General Agreement Code</th>
                                        <th>Reccomendation Date</th>
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

    public function store(CreateGeneralAgreementRequest $request)
    {
        $g_a = $request->all();
        
        $general = GeneralAgreement::create([
        'ingo_id'          => $g_a['ingo_id'],
        'ga_code'          => $g_a['ga_code'],
        'user_id'          => Auth::user()->id,
        'sw_recco_date'    => $g_a['sw_recco_date'], 
        'time_bound_year'  => $g_a['year'], 
        'time_bound_month' => $g_a['month'], 
        'finance_grant'    => $g_a['finance_grant'], 
        'commodity_grant'  => $g_a['commodity_grant'],
        ]);
        $g_id = $general->id;
        $theme_count = $g_a['thematic_area'];
        foreach($theme_count as $tc => $value)
        {
            if(isset($g_a['thematic_area'][$tc]))
            {
                GeneralTheme::create([
                'theme_id' => $g_a['thematic_area'][$tc],
                'general_agreement_id' => $g_id,
            ]);
            }
        }

        
        $counts = $g_a['cd_name'];
        foreach($counts as $count =>$value)
        {
            CountryDirector::create([
                'general_agreement_id' => $g_id,
                'name'  => $g_a['cd_name'][$count],
                'duration_from'  => $g_a['duration_from'][$count],
                'duration_to'  => $g_a['duration_to'][$count],
                'family_number'  => $g_a['family_number'][$count],
            ]);
        }

        return redirect()->route('generalagreements.index')->withFlashSuccess('General Agreement Profile has been added successfully.');            
    }

    public function edit($id)
    {
        $generalagreement = GeneralAgreement::find($id);
        $user = Auth::user();
        $project_date = $generalagreement->created_at;
        $pro_date = explode(' ', $project_date);
        $today = date('Y-m-d');
        $prodate = strtotime($pro_date[0]);
        $today = strtotime($today);
        $calc = $today-$prodate;
        $calc = date('d',$calc);
        if($user->hasRole('Admin'))
        {
             $thematic_area    = ThemeLess::all();
             $ingos            = INGO::all();
             $month_json       = file_get_contents('json/month.json');
             $months           = json_decode($month_json);
             return view('general_agreement.edit',compact('generalagreement','thematic_area','ingos','months'));
        }
        else
        {
            if($calc <= '07')
            {
                $thematic_area    = ThemeLess::all();
             $ingos            = INGO::all();
             $month_json       = file_get_contents('json/month.json');
             $months           = json_decode($month_json);
             return view('general_agreement.edit',compact('generalagreement','thematic_area','ingos','months'));
            }
            else
            {
                return redirect()->route('generalagreements.index')->withFlashSuccess('This Particular general agreement cannot be edited');
            }
        }
       
    }

    public function update(EditGeneralAgreementRequest $request,$id)
    {
        $g_a = $request->all();
        $generalagreement                     = GeneralAgreement::find($id);
        $generalagreement['ingo_id']          = $g_a['ingo_id'];
        $generalagreement['ga_code']          = $g_a['ga_code'];
        $generalagreement['user_id']          = Auth::user()->id;
        $generalagreement['sw_recco_date']    = $g_a['sw_recco_date'];
        $generalagreement['time_bound_year']  = $g_a['year'];
        $generalagreement['time_bound_month'] = $g_a['month'];
        $generalagreement['finance_grant']    = $g_a['finance_grant'];
        $generalagreement['commodity_grant']  = $g_a['commodity_grant'];
        $generalagreement->save();

        GeneralRenew::where('general_agreement_id','=',$id)->delete();

        if(!empty($g_a['date_of_renew']))
        {
            $renew_count = $g_a['date_of_renew'];
        foreach($renew_count as $rc =>$value)
        {
            if(isset($g_a['date_of_renew']))
            {
                GeneralRenew::create([
                    'date_of_renew' => $g_a['date_of_renew'][$rc],
                    'general_agreement_id' => $g_a['project_id'][$rc],
                    'year' => $g_a['new_year'][$rc],
                    'month' => $g_a['new_month'][$rc],
                ]);
            }
        }
        }
        
        GeneralTheme::where('general_agreement_id','=',$id)->delete();
        $theme_count = $g_a['thematic_area'];
        foreach($theme_count as $tc => $value)
        {
            if(isset($g_a['thematic_area'][$tc]))
            {
                GeneralTheme::create([
                'theme_id' => $g_a['thematic_area'][$tc],
                'general_agreement_id' => $id,
            ]);
            }
        }

        CountryDirector::where('general_agreement_id','=',$id)->delete();
        $counts = $g_a['cd_name'];
        foreach($counts as $count =>$value)
        {
            CountryDirector::create([
                'name'  => $g_a['cd_name'][$count],
                'general_agreement_id' => $id,
                'duration_from'  => $g_a['duration_from'][$count],
                'duration_to'  => $g_a['duration_to'][$count],
                'family_number'  => $g_a['family_number'][$count],
            ]);
        }

        return redirect()->route('generalagreements.index')->withFlashSuccess('General Agreement Profile has been updated successfully.'); 
    }

    public function destroy(DeleteGeneralAgreementRequest $request , $id)
    {
        GeneralAgreement::where('id','=',$id)->delete();
        GeneralTheme::where('general_agreement_id','=',$id)->delete();
        CountryDirector::where('general_agreement_id','=',$id)->delete();
        return redirect()->route('generalagreements.index')->withFlashSuccess('General Agreement Profile has been deleted successfully.'); 
    }

    public function preview($id)
    {
        $generalagreement = GeneralAgreement::find($id);
        $thematic_area    = ThemeLess::all();
        $ingos            = INGO::all();
        $month_json       = file_get_contents('json/month.json');
        $months           = json_decode($month_json);
        return view('general_agreement.preview',compact('generalagreement','thematic_area','ingos','months'));
    }
}
